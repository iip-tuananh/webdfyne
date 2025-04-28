<?php

namespace App\Http\Controllers\Front;

use App\Helpers\FileHelper;
use App\Http\Traits\ResponseTrait;
use App\Model\Admin\About;
use App\Model\Admin\Block;
use App\Model\Admin\Category;
use App\Model\Admin\CategorySpecial;
use App\Model\Admin\Config;
use App\Model\Admin\Delivery;
use App\Model\Admin\Order;
use App\Model\Admin\Privacy;
use App\Model\Admin\Product;
use App\Model\Admin\ProductCategorySpecial;
use App\Model\Admin\ProductCollection;
use App\Model\Admin\ProductSize;
use App\Model\Admin\ProductVariant;
use App\Model\Admin\Refund;
use App\Model\Admin\Term;
use App\Model\Admin\Topic;
use App\Model\Common\User;
use App\Services\CategoryService;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Validator;
use Response;
use App\Http\Controllers\Controller;
use App\Model\Admin\Banner;
use App\Model\Admin\Contact;
use App\Model\Admin\DesignDetail;
use App\Model\Admin\DesignOrder;
use App\Model\Admin\Partner;
use App\Model\Admin\Post;
use App\Model\Admin\PostCategory;
use App\Model\Admin\ProductRate;
use App\Model\Admin\Review;
use App\Model\Admin\Voucher;
use DB;
use Mail;
use SluggableScopeHelpers;

class FrontController extends Controller
{
    use ResponseTrait;

    public $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function homePage() {

        // danh mục đặc biệt
        $categoriesSpecial = CategorySpecial::query()->with([
            'products' => function($q) {
                $q->with([
                    'variants' => function($q) {
                        $q->with(['color', 'image', 'baseProduct', 'galleries' => function ($q) {
                            $q->select(['id', 'variant_id', 'sort'])
                                ->with(['image'])
                                ->orderBy('sort', 'ASC');
                        }])
                        ->where('is_default', 1);
                    },
                ]);
            },
            'category'
        ])->where('show_home_page', 1)->get();

        $categoriesSpecial->each(function($category) {
            $allDefaultVariants = $category->products
                ->pluck('variants')
                ->flatten();

            $category->setRelation('variants', $allDefaultVariants);
        });

        // bộ sưu tập
        $categoriesCollection = Category::query()->with(['image', 'parent',
            'productsCollection' => function($q) {
            $q->with([
                'variants' => function($q) {
                    $q->with(['color', 'image', 'baseProduct', 'galleries' => function ($q) {
                        $q->select(['id', 'variant_id', 'sort'])
                            ->with(['image'])
                            ->orderBy('sort', 'ASC');
                    }])
                        ->where('is_default', 1);
                },
            ]);
        },])->where('show_home_page', 1)->where('type', 'collection')->get();

        $categoriesCollection->each(function($category) {
            $allDefaultVariants = $category->productsCollection
                ->pluck('variants')
                ->flatten();

            $category->setRelation('variants', $allDefaultVariants);
        });

        $cateSpecialForBanner = CategorySpecial::query()->with('image')->where('highlight', 1)->first();
        return view('site.home', compact('categoriesSpecial', 'categoriesCollection', 'cateSpecialForBanner'));
    }

    public function getProductList($categorySlug)
    {
        $category = Category::findBySlug($categorySlug);
        $products = Product::query()->with([
            'variants' => function($q) {
                $q->where('is_default', 1);
            }
            ])
            ->where('cate_id', $category->id)
            ->get();

        $productVariants = ProductVariant::query()->with(['baseProduct', 'color', 'image', 'galleries' => function ($q) {
            $q->select(['id', 'variant_id', 'sort'])
                ->with(['image'])
                ->orderBy('sort', 'ASC');
        },])->whereHas('baseProduct', function($q) use ($category) {
                $q->where('cate_id', $category->id);
            })->where('is_default', 1)->get();

        // colors
        $variants = ProductVariant::query()->with(['color'])->whereIn('product_id', $products->pluck('id')->toArray())
            ->get();
        $colors = $variants->pluck('color')->unique('id')->values();
        $productSizes = ProductSize::query()->with(['size'])->whereIn('product_id', $products->pluck('id')->toArray())
            ->get();
        $sizes = $productSizes->pluck('size')->unique('id')->values();


        return view('site.product_category', compact('productVariants', 'category', 'colors', 'sizes'));
    }

    public function getProductListCollection(Request $request, $categorySlug)
    {
        $category = Category::findBySlug($categorySlug);
        $product_ids = ProductCollection::query()->where('category_id', $category->id)->pluck('product_id')->toArray();

        $productVariants = ProductVariant::query()->with(['baseProduct', 'color', 'image', 'galleries' => function ($q) {
            $q->select(['id', 'variant_id', 'sort'])
                ->with(['image'])
                ->orderBy('sort', 'ASC');
        },])
            ->whereIn('product_id', $product_ids)
            ->where('is_default', 1)->get();

        // colors
        $variants = ProductVariant::query()->with(['color'])->whereIn('product_id', $product_ids)
            ->get();
        $colors = $variants->pluck('color')->unique('id')->values();
        $productSizes = ProductSize::query()->with(['size'])->whereIn('product_id', $product_ids)
            ->get();
        $sizes = $productSizes->pluck('size')->unique('id')->values();

        return view('site.product_category', compact('productVariants', 'category', 'colors', 'sizes'));
    }

    public function getProductListFeatured(Request $request, $categorySlug)
    {
        $category = CategorySpecial::findBySlug($categorySlug);
        $product_ids = ProductCategorySpecial::query()->where('category_special_id', $category->id)->pluck('product_id')->toArray();

        $productVariants = ProductVariant::query()->with(['baseProduct', 'color', 'image', 'galleries' => function ($q) {
            $q->select(['id', 'variant_id', 'sort'])
                ->with(['image'])
                ->orderBy('sort', 'ASC');
        },])
            ->whereIn('product_id', $product_ids)
            ->where('is_default', 1)->get();

        // colors
        $variants = ProductVariant::query()->with(['color'])->whereIn('product_id', $product_ids)
            ->get();
        $colors = $variants->pluck('color')->unique('id')->values();
        $productSizes = ProductSize::query()->with(['size'])->whereIn('product_id', $product_ids)
            ->get();
        $sizes = $productSizes->pluck('size')->unique('id')->values();

        return view('site.product_category', compact('productVariants', 'category', 'colors', 'sizes'));
    }



    public function getProductDetail($slug)
    {
        $orderMap = [
            'XXS'   => 1,
            'XS'    => 2,
            'S'     => 3,
            'M'     => 4,
            'L'     => 5,
            'XL'    => 6,
            'XXL'   => 7,
            'XXXL'  => 8,
            '4XL'   => 9,
            '5XL'   => 10,
            '6XL'   => 11,
        ];

        $productVariant = ProductVariant::query()
            ->with(['baseProduct', 'image', 'color', 'sizesStock.size', 'galleries' => function ($q) {
                $q->select(['id', 'variant_id', 'sort'])
                    ->with(['image'])
                    ->orderBy('sort', 'ASC');
            }, ])
            ->where('slug', $slug)->first();
        $productVariant->sizesStock = $productVariant->sizesStock
            ->sortBy(function ($stock) use ($orderMap) {
                return $orderMap[$stock->size->name] ?? PHP_INT_MAX;
            })
            ->values();

        $product = $productVariant->baseProduct()
            ->with([
                'category' => function ($q) {
                    $q->select(['id', 'name']);
                },
                'sizes',
                'reviews' => function($q) {
                    $q->where('status', Review::STATUS_APPROVED);
                },
                'variants' => function ($q) {
                    $q->with(['image', 'color', 'sizesStock', 'galleries' => function ($q) {
                        $q->select(['id', 'variant_id', 'sort'])
                            ->with(['image'])
                            ->orderBy('sort', 'ASC');
                    }, ]);
                },
            ])
            ->first();


        $totalReviews = Review::where('product_id', $product->id)
            ->where('status', Review::STATUS_APPROVED)
            ->count();

        $counts = Review::where('product_id', $product->id)
            ->where('status', Review::STATUS_APPROVED)
            ->selectRaw('rating, count(*) as frequency')
            ->groupBy('rating')
            ->orderBy('rating', 'desc')
            ->pluck('frequency', 'rating')  // -> [5=>987, 4=>93, …]
            ->toArray();

        $distribution = [];
        for ($rating = 5; $rating >= 1; $rating--) {
            $frequency  = $counts[$rating] ?? 0;
            $percentage = $totalReviews
                ? round($frequency / $totalReviews * 100)
                : 0;

            $distribution[] = compact('rating','frequency','percentage');
        }

        $reviews = $product->reviews()
            ->where('status', Review::STATUS_APPROVED)
            ->orderBy('created_at', 'desc')->paginate(5);

        return view('site.product_detail', compact('product', 'productVariant', 'distribution', 'reviews'));
    }

    public function searchProducts(Request $request) {

        $filter = $request->input('filter', []);
        $sortBy = $request->input('sortOption');

        $inStock = $request->boolean('filter.availability.inStock', false);
        $outStock = $request->boolean('filter.availability.outStock', false);

        $colourIds = Arr::get($filter, 'colourIds', []);
        $sizeIds   = Arr::get($filter, 'sizeIds', []);

        $priceGte  = Arr::get($filter, 'priceGte');
        $priceLte  = Arr::get($filter, 'priceLte');

        $categoryId = Arr::get($filter, 'category_id');

        $products = Product::query();

        if($request->page_type == 'collections') {
            $product_ids = ProductCollection::query()->where('category_id', $categoryId)->pluck('product_id')->toArray();

            $productVariant = ProductVariant::query()
                ->select('product_variants.*')
                ->with(['baseProduct', 'image', 'galleries' => function ($q) {
                    $q->select(['id', 'variant_id', 'sort'])
                        ->with(['image'])
                        ->orderBy('sort', 'ASC');
                },])
                ->whereIn('product_id', $product_ids)
                ->leftJoin('products as bp', 'product_variants.product_id', '=', 'bp.id');
        } elseif ($request->page_type == 'featured') {
            $product_ids = ProductCategorySpecial::query()->where('category_special_id', $categoryId)->pluck('product_id')->toArray();

            $productVariant = ProductVariant::query()
                ->select('product_variants.*')
                ->with(['baseProduct', 'image', 'galleries' => function ($q) {
                    $q->select(['id', 'variant_id', 'sort'])
                        ->with(['image'])
                        ->orderBy('sort', 'ASC');
                },])
                ->whereIn('product_id', $product_ids)
                ->leftJoin('products as bp', 'product_variants.product_id', '=', 'bp.id');
        } else {
            $productVariant = ProductVariant::query()
                ->select('product_variants.*')
                ->with(['baseProduct', 'image', 'galleries' => function ($q) {
                    $q->select(['id', 'variant_id', 'sort'])
                        ->with(['image'])
                        ->orderBy('sort', 'ASC');
                },])
                ->whereHas('baseProduct', function($q) use ($categoryId) {
                    $q->where('cate_id', $categoryId);
                })
                ->leftJoin('products as bp', 'product_variants.product_id', '=', 'bp.id');
        }

        if($colourIds) {
            $productVariant->whereIn('color_id', $colourIds);
        } else {
            $productVariant->where('is_default', 1);
        }

        if($sizeIds) {
            $productVariant->whereHas('sizesStock', function($q) use ($sizeIds) {
                $q->whereIn('size_id', $sizeIds);
            });
        }

        if ($inStock && ! $outStock) {
            $productVariant->whereHas('sizesStock', function($q) {
                $q->where('stock', '>', 0);
            });
        } elseif ($outStock && ! $inStock) {
            $productVariant->whereHas('sizesStock', function($q) {
                $q->where('stock', '<=', 0);
            });
        }

        if($priceGte) {
            $productVariant->whereHas('baseProduct', function($q) use ($priceGte) {
                $q->where('price', '>=', $priceGte);
            });
        }

        if($priceLte) {
            $productVariant->whereHas('baseProduct', function($q) use ($priceLte) {
                $q->where('price', '<=', $priceLte);
            });
        }

        switch ($sortBy) {
            case 'name_asc':
                $productVariant->orderBy('bp.name', 'asc');
                break;
            case 'name_desc':
                $productVariant->orderBy('bp.name', 'desc');
                break;
            case 'price_asc':
                $productVariant->orderBy('bp.price', 'asc');
                break;
            case 'price_desc':
                $productVariant->orderBy('bp.price', 'desc');
            case 'date_asc':
                $productVariant->orderBy('product_variants.created_at', 'asc');
                break;
            default:
                $productVariant->orderBy('product_variants.created_at', 'desc');
                break;
        }

        if($request->page_type == 'collections') {
            $productIds = ProductCategorySpecial::query()->where('category_special_id', $request->categoryId)->pluck('product_id')->toArray();
            $products->whereIn('id', $productIds);
        } else {
            $products->where('cate_id', $request->categoryId);
        }

        $productVariants = $productVariant->get();
        $json = new \stdClass();
        $json->success = true;
        $json->message = "Thao tác thành công!";
        $json->data = view('site.partials.product_list', compact('productVariants'))->render();

        return Response::json($json);
    }

    public function collections(Request $request) {
       $categoríesSpecial = CategorySpecial::query()->with([
            'products' => function($q) {
                $q->where('state', 1);
            },
            'image',
        ])
            ->has('products')
            ->where('type',10)
            ->orderBy('order_number')->get();

        return view('site.collection', compact('categoríesSpecial'));
    }

    public function getCollectionList($slug)
    {
        $category = CategorySpecial::findBySlug($slug);
        $productIds = ProductCategorySpecial::query()->where('category_special_id', $category->id)->pluck('product_id')->toArray();
        $products = Product::query()->with(['image', 'galleries.image'])
            ->whereIn('id', $productIds)
            ->latest()->paginate(10);

        return view('site.product_category', compact('products', 'category'));
    }

    public function support() {
        return view('site.support');
    }
    public function submitSupport(Request $request) {
        $rule  =  [
            'contact.name' => 'required',
            'contact.body'  => 'required',
            'contact.email'  => 'required|email|max:255',
        ];

        $validate = Validator::make(
            $request->all(),
            $rule,
            [
                'contact.name' => 'Vui lòng nhập họ tên',
                'contact.email' => 'Vui lòng nhập email',
                'contact.body' => 'Vui lòng nhập nội dung',
            ]
        );

        if ($validate->fails()) {
            return $this->responseErrors('Gửi yêu cầu thất bại!', $validate->errors());
        }

        $contact = new Contact();
        $contact->user_name = $request->contact['name'];
        $contact->email = $request->contact['email'];
        $contact->content = $request->contact['body'];
        $contact->type = Contact::SUPPORT;

        $contact->save();

        return $this->responseSuccess('Gửi yêu cầu thành công!');
    }

    public function contact() {
        $category = CategorySpecial::query()->get()->random();

        $category = CategorySpecial::findBySlug($category->first()->slug);
        $product_ids = ProductCategorySpecial::query()->where('category_special_id', $category->id)->pluck('product_id')->toArray();

        $productVariants = ProductVariant::query()->with(['baseProduct', 'color', 'image', 'galleries' => function ($q) {
            $q->select(['id', 'variant_id', 'sort'])
                ->with(['image'])
                ->orderBy('sort', 'ASC');
        },])
            ->whereIn('product_id', $product_ids)
            ->where('is_default', 1)->limit(4)->get();

        return view('site.contact', compact('category', 'productVariants'));
    }
    public function submitContact(Request $request) {
        $rule  =  [
            'contact.first_name' => 'required',
            'contact.last_name'  => 'required',
            'contact.email'  => 'required|email|max:255',
            'contact.message'  => 'required',
        ];

        $validate = Validator::make(
            $request->all(),
            $rule,
            [
                'contact.first_name.required' => 'Vui lòng nhập họ tên',
                'contact.last_name.required' => 'Vui lòng nhập họ tên',
                'contact.email.required' => 'Vui lòng nhập email',
                'contact.body.required' => 'Vui lòng nhập nội dung',
            ]
        );

        if ($validate->fails()) {
            return $this->responseErrors('Gửi yêu cầu thất bại!', $validate->errors());
        }

        $contact = new Contact();
        $contact->user_name = $request->contact['last_name'] . ' ' .$request->contact['first_name'];
        $contact->email = $request->contact['email'];
        $contact->content = $request->contact['message'];
        $contact->type = Contact::CONTACT;

        $contact->save();

        return $this->responseSuccess('Gửi yêu cầu thành công!');
    }

    public function about() {
        $about = About::query()->find(1);

        $category = CategorySpecial::query()->get()->random();

        $category = CategorySpecial::findBySlug($category->first()->slug);
        $product_ids = ProductCategorySpecial::query()->where('category_special_id', $category->id)->pluck('product_id')->toArray();

        $productVariants = ProductVariant::query()->with(['baseProduct', 'color', 'image', 'galleries' => function ($q) {
            $q->select(['id', 'variant_id', 'sort'])
                ->with(['image'])
                ->orderBy('sort', 'ASC');
        },])
            ->whereIn('product_id', $product_ids)
            ->where('is_default', 1)->limit(4)->get();


        return view('site.about_us', compact('about', 'productVariants', 'category'));
    }

    public function privacy() {
        $privacy = Privacy::query()->find(1);
        $category = CategorySpecial::query()->get()->random();

        $category = CategorySpecial::findBySlug($category->first()->slug);
        $product_ids = ProductCategorySpecial::query()->where('category_special_id', $category->id)->pluck('product_id')->toArray();

        $productVariants = ProductVariant::query()->with(['baseProduct', 'color', 'image', 'galleries' => function ($q) {
            $q->select(['id', 'variant_id', 'sort'])
                ->with(['image'])
                ->orderBy('sort', 'ASC');
        },])
            ->whereIn('product_id', $product_ids)
            ->where('is_default', 1)->limit(4)->get();

        return view('site.privacy', compact('privacy','productVariants', 'category'));
    }

    public function shipping() {
        $privacy = Delivery::query()->find(1);
        $category = CategorySpecial::query()->get()->random();

        $category = CategorySpecial::findBySlug($category->first()->slug);
        $product_ids = ProductCategorySpecial::query()->where('category_special_id', $category->id)->pluck('product_id')->toArray();

        $productVariants = ProductVariant::query()->with(['baseProduct', 'color', 'image', 'galleries' => function ($q) {
            $q->select(['id', 'variant_id', 'sort'])
                ->with(['image'])
                ->orderBy('sort', 'ASC');
        },])
            ->whereIn('product_id', $product_ids)
            ->where('is_default', 1)->limit(4)->get();

        return view('site.privacy', compact('privacy','productVariants', 'category'));
    }

    public function refund() {
        $privacy = Refund::query()->find(1);
        $category = CategorySpecial::query()->get()->random();

        $category = CategorySpecial::findBySlug($category->first()->slug);
        $product_ids = ProductCategorySpecial::query()->where('category_special_id', $category->id)->pluck('product_id')->toArray();

        $productVariants = ProductVariant::query()->with(['baseProduct', 'color', 'image', 'galleries' => function ($q) {
            $q->select(['id', 'variant_id', 'sort'])
                ->with(['image'])
                ->orderBy('sort', 'ASC');
        },])
            ->whereIn('product_id', $product_ids)
            ->where('is_default', 1)->limit(4)->get();

        return view('site.privacy', compact('privacy','productVariants', 'category'));
    }

    public function term() {
        $term = Term::query()->find(1);
        $category = CategorySpecial::query()->get()->random();

        $category = CategorySpecial::findBySlug($category->first()->slug);
        $product_ids = ProductCategorySpecial::query()->where('category_special_id', $category->id)->pluck('product_id')->toArray();

        $productVariants = ProductVariant::query()->with(['baseProduct', 'color', 'image', 'galleries' => function ($q) {
            $q->select(['id', 'variant_id', 'sort'])
                ->with(['image'])
                ->orderBy('sort', 'ASC');
        },])
            ->whereIn('product_id', $product_ids)
            ->where('is_default', 1)->limit(4)->get();

        return view('site.term', compact('term','productVariants', 'category'));
    }


    public function faqs() {
        $topics = Topic::query()->with(['questions'])->latest()->get();
        $columns = $topics
            ->chunk(ceil(count($topics) / 3));

        return view('site.faq', compact('columns'));
    }

    public function getFaq($id) {
        $topic = Topic::query()->with(['questions'])->find(1);

        return view('site.faq_detail', compact('topic'));
    }

    public function submitRating(Request $request) {
        $rule  =  [
            'formReview.name' => 'required',
            'formReview.title'  => 'required',
            'formReview.email'  => 'required|email|max:255',
            'formReview.content'  => 'required',
        ];

        $validate = Validator::make(
            $request->all(),
            $rule,
            [
                'formReview.name.required' => 'Please enter your full name',
                'formReview.email.required' => 'Please enter your email address',
                'formReview.title.required' => 'Please enter a review title',
                'formReview.content.required' => 'Please enter your review content',
            ]
        );

        if ($validate->fails()) {
            return $this->responseErrors('Gửi yêu cầu thất bại!', $validate->errors());
        }

        $data = $request->formReview;

        $review = new Review();
        $review->product_id = $data['product_id'];
        $review->user_name = $data['name'];
        $review->user_email = $data['email'];
        $review->title = $data['title'];
        $review->content = $data['content'];
        $review->rating = $data['rating'];
        $review->status = Review::STATUS_PENDING;

        $review->save();

        $json = new \stdClass();
        $json->success = true;
        $json->message = "Operation successful!";
        return Response::json($json);
    }

    public function getMoreReview(Request $request, $productId) {
        $sort = $request->query('sort', 'most-recent');

        $product = Product::findOrFail($productId);
        $query   = $product->reviews()->where('status', Review::STATUS_APPROVED);

        switch ($sort) {
            case 'highest-rating':
                $query->orderBy('rating', 'desc');
                break;
            case 'lowest-rating':
                $query->orderBy('rating', 'asc');
                break;
            case 'most-recent':
            default:
                $query->orderBy('created_at', 'desc');
        }

        $perPage = 5;
        $reviews = $query
            ->paginate($perPage)
            ->appends(['sort' => $sort]);

        return view('site.partials.review', compact('reviews'));
    }

    public function search(Request $request) {
        $keyWord = $request->get('keyword');

        $productVariants = ProductVariant::query()
            ->select('product_variants.*')
            ->with(['baseProduct', 'image', 'galleries' => function ($q) {
                $q->select(['id', 'variant_id', 'sort'])
                    ->with(['image'])
                    ->orderBy('sort', 'ASC');
            },])
            ->whereHas('baseProduct', function($q) use ($keyWord) {
                $q->where('name', 'like', '%' . $keyWord . '%');
            })
            ->leftJoin('products as bp', 'product_variants.product_id', '=', 'bp.id')->get();

        return view('site.search', compact('productVariants','keyWord'));
    }

    public function trackOrder(Request $request) {
        $config = Config::query()->find(1);

        return view('site.orders.track', compact('config'));
    }

    public function getTracking(Request $request) {
        $json = new \stdClass();
        $validate = \Illuminate\Support\Facades\Validator::make(
            $request->all(),
            [
                'order_number' => 'required',
            ]
        );

        if ($validate->fails()) {
            $json->success = false;
            $json->errors = $validate->errors();
            $json->message = "Operation failed!";
            return Response::json($json);
        }

        $order = Order::query()->where('code', $request->input('order_number'))->first();
        $order->status = Order::STATUS[$order->status];

        $json->success = true;
        $json->data = $order;
        return Response::json($json);
    }
}
