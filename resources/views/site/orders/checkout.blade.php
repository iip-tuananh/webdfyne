<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <title>Checkout - {{ $config->web_title }}</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, height=device-height"/>
    <meta name="referrer" content="origin"/>
    <link rel="preconnect" href="https://cdn.shopify.com/shopifycloud/checkout-web/assets/" crossorigin/>
    <link rel="dns-prefetch" href="https://cdn.shopify.com/shopifycloud/checkout-web/assets/" crossorigin/>
    <link rel="preconnect" href="https://checkout.pci.shopifyinc.com" crossorigin/>
    <link rel="dns-prefetch" href="https://checkout.pci.shopifyinc.com" crossorigin/>
    <link rel="preconnect" href="https://shop.app" crossorigin/>
    <link rel="dns-prefetch" href="https://shop.app" crossorigin/>
</head>
<body class="Loading">
<script>
    (function() {
        try {
            // No need to use the value of syntaxCheck, as we only care if it is valid syntax
            const [syntaxCheck] = ((abc = 1) => [Promise.resolve(abc)])();
            window.checkoutMinimalBrowserSupport = typeof window.fetch === 'function';
        } catch (err) {}
    })();
</script>
<script>
    if (window.checkoutMinimalBrowserSupport !== true) {
        document.documentElement.innerHTML = "<div class=\"error-container\"><style>* {\n  box-sizing: border-box;\n  margin: 0;\n  padding: 0;\n}\n\nhtml {\n  font-family: \"Helvetica Neue\", Helvetica, Arial, sans-serif;\n  background: #F1F1F1;\n  font-size: 62.5%;\n  color: #303030;\n  min-height: 100%;\n}\n\nbody {\n  padding: 0;\n  margin: 0;\n  line-height: 2.7rem;\n}\n\nh1 {\n  font-size: 1.8rem;\n  font-weight: 400;\n  margin: 0 0 1.4rem 0;\n}\n\np {\n  font-size: 1.5rem;\n  margin: 0;\n}\n\n.error-container {\n  padding: 4rem 3.5rem;\n}\n\n@media all and (min-width:500px) {\n  .error-container {\n    padding: 7.5rem 10.5rem;\n    align-items: center;\n  }\n}</style><div><h1>It looks like your browser version isn't supported.</h1><p>Please update your browser to access the checkout and complete your purchase.</p></div></div>";
    }
</script>
<style>
    .invalid-feedback {
        font-size: 12.5px;
        color: #dc3545;
    }
    :root {
        --x-skeleton-color-global-accent: hsl(204, 77%, 39%);
        --x-skeleton-color-global-background: hsl(0, 0%, 100%);
        --x-skeleton-color-global-backgroundSubdued: hsl(0, 0%, 96%);
        --x-skeleton-color-global-border: hsl(0, 0%, 87%);
        --x-skeleton-color-global-text: hsl(0, 0%, 0%);
        --x-skeleton-color-global-textContrast: hsl(0, 0%, 100%);
        --x-skeleton-color-global-textSubdued: hsl(0, 0%, 44%);
        --x-skeleton-color-global-textSubdued200: hsl(0, 0%, 90%);
        --x-skeleton-color-schemes-scheme2-base-background: hsl(0, 0%, 96%);
        --x-skeleton-color-schemes-scheme2-base-backgroundSubdued: hsl(0, 0%, 93%);
        --x-skeleton-color-schemes-scheme2-base-border: hsl(0, 0%, 84%);
        --x-skeleton-color-schemes-scheme2-base-text: hsl(0, 0%, 0%);
        --x-skeleton-color-schemes-scheme2-base-textContrast: hsl(0, 0%, 96%);
        --x-skeleton-color-schemes-scheme2-base-textSubdued: hsl(0, 0%, 40%);
        --x-skeleton-color-schemes-scheme2-base-textSubdued200: hsl(0, 0%, 80%);
        --x-skeleton-color-global-accent: #f0c417;
        --x-skeleton-typography-line-small: 1.2;
        --x-skeleton-typography-line-base: 1.5;
        --x-skeleton-line-quantity-size: 2.1rem;
        --x-skeleton-typography-size-small: 1.2rem;
        --x-skeleton-typography-size-default: 1.4rem;
        --x-skeleton-typography-size-medium: 1.6rem;
        --x-skeleton-typography-size-large: 1.9rem;
        --x-skeleton-typography-size-extra-large: 2.1rem;
        --x-skeleton-typography-size-extra-extra-large: 2.4rem;
        --x-skeleton-typography-primary-weight-bold: 400;
        --x-skeleton-typography-primary-fonts: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
        --x-skeleton-typography-secondary-weight-bold: 600;
        --x-skeleton-typography-secondary-fonts: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
        --x-skeleton-spacing-none: 0;
        --x-skeleton-spacing-small-100: 1.1rem;
        --x-skeleton-spacing-small-200: 0.9rem;
        --x-skeleton-spacing-small-300: 0.7rem;
        --x-skeleton-spacing-small-400: 0.5rem;
        --x-skeleton-spacing-small-500: 0.3rem;
        --x-skeleton-spacing-base: 1.4rem;
        --x-skeleton-spacing-large-100: 1.7rem;
        --x-skeleton-spacing-large-200: 2.1rem;
        --x-skeleton-spacing-large-300: 2.6rem;
        --x-skeleton-spacing-large-400: 3.2rem;
        --x-skeleton-spacing-large-500: 3.8rem;
        --x-skeleton-border-radius-none: 0;
        --x-skeleton-border-radius-base: 5px;
        --x-skeleton-border-radius-small: 2px;
        --x-skeleton-border-radius-large: 10px;
    }
    @keyframes SkeletonPulse {
        50% {
            opacity: 1;
        }
        75% {
            opacity: 0.5;
        }
        100% {
            opacity: 1;
        }
    }
    *,
    :after,
    :before {
        box-sizing: border-box;
    }
    body,
    html {
        height: 100%;
        margin: 0;
        width: 100%;
    }
    html {
        -webkit-text-size-adjust: 100%;
        text-size-adjust: 100%;
        font-size: 62.5%;
        font-family: var(--x-skeleton-typography-primary-fonts);
        line-height: var(--x-skeleton-typography-line-base);
    }
    body {
        -webkit-font-smoothing: subpixel-antialiased;
        overflow-wrap: break-word;
        overflow-x: hidden;
        overflow-y: scroll;
    }
    body.Loading {
        position: fixed;
    }
    /* TODO: need to take it out of the accessibility tree, too? */
    body.Loading > .LoadingShell {
        opacity: 1;
    }
    .BlockStack {
        display: grid;
    }
    .BlockStack--spacing-small500 {
        gap: var(--x-skeleton-spacing-small-500);
    }
    .BlockStack--spacing-small300 {
        gap: var(--x-skeleton-spacing-small-300);
    }
    .BlockStack--spacing-small100 {
        gap: var(--x-skeleton-spacing-small-100);
    }
    .BlockStack--spacing-base {
        gap: var(--x-skeleton-spacing-base);
    }
    .BlockStack--spacing-large100 {
        gap: var(--x-skeleton-spacing-large-100);
    }
    .BlockStack--spacing-large200 {
        gap: var(--x-skeleton-spacing-large-200);
    }
    .BlockStack--min-inline-size-full {
        flex: 1;
    }
    .BlockStack--inline-alignment-center {
        justify-items: center;
    }
    .BlockStack--inline-alignment-end {
        justify-items: end;
    }
    .LoadingHeaderHeading {
        margin: 0;
        font-size: var(--x-skeleton-typography-size-extra-large);
        font-weight: var(--x-skeleton-typography-secondary-weight-bold);
        font-family: var(--x-skeleton-typography-secondary-fonts);
        line-height: var(--x-skeleton-typography-line-small);
    }
    .LoadingHeaderHeading-uplift {
        font-size: var(--x-skeleton-typography-size-large);
    }
    .LoadingHeaderImage {
        display: block;
        max-width: 100%;
        height: auto;
    }
    .InlineStack {
        display: flex;
        min-height: 100%;
        min-width: 100%;
    }
    .InlineStack--spacing-base {
        column-gap: var(--x-skeleton-spacing-base);
    }
    .InlineStack--spacing-small100 {
        column-gap: var(--x-skeleton-spacing-small-100);
    }
    .InlineStack--spacing-large200 {
        column-gap: var(--x-skeleton-spacing-large-200);
    }
    .InlineStack--inline-alignment-spaceBetween {
        justify-content: space-between;
    }
    .InlineStack--block-alignment-start {
        align-items: start;
    }
    .InlineStack--block-alignment-center {
        align-items: center;
    }
    .Divider {
        width: 100%;
        height: 1px;
        background-color: var(--x-skeleton-default-color-border);
    }
    .SkeletonButton {
        background-color: var(--x-skeleton-default-color-textSubdued200);
        border-radius: var(--x-skeleton-border-radius-base);
        animation: SkeletonPulse 4000ms ease infinite;
        width: 100%;
    }
    .SkeletonButtonInner {
        width: 100%;
        height: 4.8rem;
    }
    .SkeletonImage {
        background-color: var(--x-skeleton-default-color-textSubdued200);
        animation: SkeletonPulse 4000ms ease infinite;
        width: 100%;
    }
    .SkeletonImage--corner-radius-small {
        border-radius: var(--x-skeleton-border-radius-small);
    }
    .SkeletonImage--corner-radius-base {
        border-radius: var(--x-skeleton-border-radius-base);
    }
    .SkeletonImage--corner-radius-large {
        border-radius: var(--x-skeleton-border-radius-large);
    }
    .SkeletonImage--corner-radius-rounded {
        border-radius: 100%;
    }
    .SkeletonImageInner {
        width: 100%;
        height: 100%;
    }
    @supports (aspect-ratio: 1) {
        .SkeletonImage {
            aspect-ratio: var(--skeleton-thumbnail-aspect-ratio, 1);
        }
    }
    @supports not (aspect-ratio: 1) {
        .SkeletonImage::before {
            content: "";
            height: 0;
            display: block;
            padding-bottom: 100%;
            padding-bottom: calc(100% / var(--skeleton-thumbnail-aspect-ratio, 1));
        }
    }
    .SkeletonText {
        background-color: var(--x-skeleton-default-color-textSubdued200);
        border-radius: var(--x-skeleton-border-radius-base);
        animation: SkeletonPulse 4000ms ease infinite;
    }
    .SkeletonTextInner {
        display: inline-block;
    }
    .SkeletonTextInner--inline-size-small {
        width: 10ch;
    }
    .SkeletonTextInner--inline-size-base {
        width: 20ch;
    }
    .SkeletonTextInner--inline-size-large {
        width: 30ch;
    }
    .SkeletonTextInner--inline-size-full {
        width: 100%;
    }
    .Icon {
        fill: none;
        color: var(--x-skeleton-default-color-border);
        stroke: currentColor;
    }
    .Icon path {
        vector-effect: non-scaling-stroke;
        stroke-width: 1.4px;
    }
    .LoadingShellLineItems {
        display: grid;
        grid-auto-flow: row;
        align-items: stretch;
        gap: var(--x-skeleton-spacing-base);
    }
    .LoadingShellLine {
        display: grid;
        grid-template-columns: auto 1fr auto;
        gap: var(--x-skeleton-spacing-base);
        align-items: center;
        font-size: var(--x-type-size-base);
    }
    .LoadingShellLineImageWrapper {
        width: calc(6.4rem * var(--skeleton-thumbnail-inline-size, 1));
        height: calc(6.4rem / var(--skeleton-thumbnail-box-size, 1));
        position: relative;
    }
    .LoadingShellImageWrapper--Small {
        width: 3.2rem;
        height: 3.2rem;
        position: relative;
    }
    .LoadingShellLineImage {
        width: 6.4rem;
        height: 6.4rem;
        display: flex;
        align-items: center;
        justify-content: center;
        object-fit: contain;
        background: var(--x-skeleton-default-color-backgroundSubdued);
    }
    .LoadingShellLineImage--border-full {
        border: 1px solid var(--x-skeleton-default-color-border);
    }
    .LoadingShellLineImage--corner-radius-small {
        border-radius: var(--x-skeleton-border-radius-small);
    }
    .LoadingShellLineImage--corner-radius-base {
        border-radius: var(--x-skeleton-border-radius-base);
    }
    .LoadingShellLineImage--corner-radius-large {
        border-radius: var(--x-skeleton-border-radius-large);
    }
    .LoadingShellLineImage--corner-radius-rounded {
        border-radius: 100%;
    }
    .LoadingShellLineImageIcon {
        width: 3.3rem;
        height: 3.3rem;
    }
    .LoadingShellLineQuantity {
        position: absolute;
        top: 0;
        right: 0;
        transform: translate(25%, -50%);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 2.2rem;
        min-height: 2.2rem;
        padding: 0 var(--x-skeleton-spacing-small-300);
        border-radius: 1.1rem;
        background: var(--x-skeleton-default-color-textSubdued);
        color: var(--x-skeleton-default-color-textContrast);
        font-size: var(--x-skeleton-typography-size-small);
        font-weight: 500;
    }
    .LoadingShellLineQuantity--corner-radius-none {
        border-radius: 0;
    }
    .LoadingShellLineContent {
        display: flex;
        flex-direction: column;
        align-self: baseline;
        min-height: calc(6.4rem / var(--skeleton-thumbnail-box-size, 1));
        justify-content: center;
    }
    .LoadingShellLinePrice {
        display: flex;
        align-self: baseline;
    }
    .Text {
        font-size: var(--x-skeleton-typography-size-default);
    }
    .Text--size-small {
        font-size: var(--x-skeleton-typography-size-small);
    }
    .Text--size-large {
        font-size: var(--x-skeleton-typography-size-large);
    }
    .Text--size-extraExtraLarge {
        font-size: var(--x-skeleton-typography-size-extra-extra-large);
    }
    .Text--appearance-subdued {
        color: var(--x-skeleton-default-color-textSubdued);
    }
    .SkeletonExpressCheckoutButtons {
        display: grid;
        gap: var(--x-skeleton-spacing-small-100);
        grid-template-columns: repeat(2, 1fr);
    }
    .SkeletonExpressCheckoutButtons > *:first-child {
        grid-column: 1 / -1;
    }
    .SkeletonExpressCheckout {
        margin-bottom: var(--x-skeleton-spacing-large-500);
    }
    .ExpressCheckoutDivider {
        display: flex;
        place-items: center;
        height: 21px;
        padding-top: calc(var(--x-skeleton-spacing-large-500) - 1px);
    }
    @media screen and (min-width: 1000px) {
        .SkeletonExpressCheckoutButtons {
            grid-template-columns: repeat(3, 1fr);
        }
        .SkeletonExpressCheckoutButtons > *:first-child {
            grid-column: auto;
        }
        .SkeletonExpressCheckoutButtons {
            grid-template-columns: repeat(3, 1fr);
        }
        .SkeletonExpressCheckoutButtons > *:first-child {
            grid-column: auto;
        }
    }
    .LoadingShellHeader--banner {
        background-position: 50% 50%;
        background-size: cover;
        background-image: var(--x-skeleton-banner-image);
        --x-skeleton-header-shop-name-color: #fff;
        --x-skeleton-cart-color: #fff;
    }
    .VisuallyHidden {
        border-width: 0;
        clip: rect(0, 0, 0, 0);
        height: 1px;
        margin: -1px;
        overflow: hidden;
        padding: 0;
        position: absolute;
        width: 1px;
        white-space: nowrap;
    }
    .FadeIn {
        opacity: 0;
        animation: 400ms FadeIn 150ms forwards;
    }
    @keyframes FadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }
    .colorSchemeScheme1 {
        --x-skeleton-default-color-background: var(--x-skeleton-color-schemes-scheme1-base-background, var(--x-skeleton-color-global-background));
        --x-skeleton-default-color-accent: var(--x-skeleton-color-schemes-scheme1-base-accent, var(--x-skeleton-color-global-accent));
        --x-skeleton-default-color-backgroundSubdued: var(--x-skeleton-color-schemes-scheme1-base-backgroundSubdued, var(--x-skeleton-color-global-backgroundSubdued));
        --x-skeleton-default-color-border: var(--x-skeleton-color-schemes-scheme1-base-border, var(--x-skeleton-color-global-border));
        --x-skeleton-default-color-text: var(--x-skeleton-color-schemes-scheme1-base-text, var(--x-skeleton-color-global-text));
        --x-skeleton-default-color-textContrast: var(--x-skeleton-color-schemes-scheme2-base-textContrast, var(--x-skeleton-color-global-textContrast));
        --x-skeleton-default-color-textSubdued: var(--x-skeleton-color-schemes-scheme1-base-textSubdued, var(--x-skeleton-color-global-textSubdued));
        --x-skeleton-default-color-textSubdued200: var(--x-skeleton-color-schemes-scheme1-base-textSubdued200, var(--x-skeleton-color-global-textSubdued200));
    }
    .colorSchemeScheme2 {
        --x-skeleton-default-color-background: var(--x-skeleton-color-schemes-scheme2-base-background, var(--x-skeleton-color-global-background));
        --x-skeleton-default-color-accent: var(--x-skeleton-color-schemes-scheme2-base-accent, var(--x-skeleton-color-global-accent));
        --x-skeleton-default-color-backgroundSubdued: var(--x-skeleton-color-schemes-scheme2-base-backgroundSubdued, var(--x-skeleton-color-global-backgroundSubdued));
        --x-skeleton-default-color-border: var(--x-skeleton-color-schemes-scheme2-base-border, var(--x-skeleton-color-global-border));
        --x-skeleton-default-color-text: var(--x-skeleton-color-schemes-scheme2-base-text, var(--x-skeleton-color-global-text));
        --x-skeleton-default-color-textContrast: var(--x-skeleton-color-schemes-scheme2-base-textContrast, var(--x-skeleton-color-global-textContrast));
        --x-skeleton-default-color-textSubdued: var(--x-skeleton-color-schemes-scheme2-base-textSubdued, var(--x-skeleton-color-global-textSubdued));
        --x-skeleton-default-color-textSubdued200: var(--x-skeleton-color-schemes-scheme2-base-textSubdued200, var(--x-skeleton-color-global-textSubdued200));
    }
    .colorSchemeScheme3 {
        --x-skeleton-default-color-background: var(--x-skeleton-color-schemes-scheme3-base-background, var(--x-skeleton-color-global-background));
        --x-skeleton-default-color-accent: var(--x-skeleton-color-schemes-scheme3-base-accent, var(--x-skeleton-color-global-accent));
        --x-skeleton-default-color-backgroundSubdued: var(--x-skeleton-color-schemes-scheme3-base-backgroundSubdued, var(--x-skeleton-color-global-backgroundSubdued));
        --x-skeleton-default-color-border: var(--x-skeleton-color-schemes-scheme3-base-border, var(--x-skeleton-color-global-border));
        --x-skeleton-default-color-text: var(--x-skeleton-color-schemes-scheme3-base-text, var(--x-skeleton-color-global-text));
        --x-skeleton-default-color-textContrast: var(--x-skeleton-color-schemes-scheme2-base-textContrast, var(--x-skeleton-color-global-textContrast));
        --x-skeleton-default-color-textSubdued: var(--x-skeleton-color-schemes-scheme3-base-textSubdued, var(--x-skeleton-color-global-textSubdued));
        --x-skeleton-default-color-textSubdued200: var(--x-skeleton-color-schemes-scheme3-base-textSubdued200, var(--x-skeleton-color-global-textSubdued200));
    }
    .colorSchemeScheme4 {
        --x-skeleton-default-color-background: var(--x-skeleton-color-schemes-scheme4-base-background, var(--x-skeleton-color-global-background));
        --x-skeleton-default-color-accent: var(--x-skeleton-color-schemes-scheme4-base-accent, var(--x-skeleton-color-global-accent));
        --x-skeleton-default-color-backgroundSubdued: var(--x-skeleton-color-schemes-scheme4-base-backgroundSubdued, var(--x-skeleton-color-global-backgroundSubdued));
        --x-skeleton-default-color-border: var(--x-skeleton-color-schemes-scheme4-base-border, var(--x-skeleton-color-global-border));
        --x-skeleton-default-color-text: var(--x-skeleton-color-schemes-scheme4-base-text, var(--x-skeleton-color-global-text));
        --x-skeleton-default-color-textContrast: var(--x-skeleton-color-schemes-scheme2-base-textContrast, var(--x-skeleton-color-global-textContrast));
        --x-skeleton-default-color-textSubdued: var(--x-skeleton-color-schemes-scheme4-base-textSubdued, var(--x-skeleton-color-global-textSubdued));
        --x-skeleton-default-color-textSubdued200: var(--x-skeleton-color-schemes-scheme4-base-textSubdued200, var(--x-skeleton-color-global-textSubdued200));
    }
    .backgroundColorBase {
        background-color: var(--x-skeleton-default-color-background);
        color: var(--x-skeleton-default-color-text);
    }
    .backgroundColorSubdued {
        background-color: var(--x-skeleton-default-color-backgroundSubdued);
        color: var(--x-skeleton-default-color-text);
    }
    .LoadingShell {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 100000;
        pointer-events: none;
        opacity: 0;
        transition: opacity 0.2s ease;
        will-change: opacity;
        min-height: 100dvh;
        display: grid;
        grid-template-rows: auto auto 1fr;
        grid-template-areas:
      'header'
      'disclosure'
      'shell-content';
        background-image: var(--x-skeleton-shell-background-image);
        --x-skeleton-shell-inline-size: 57rem;
        --x-skeleton-shell-background-image: var(--skeleton-config-shell-background-image);
        --x-skeleton-shell-header-inline-size: var(--x-skeleton-shell-inline-size);
        --x-skeleton-shell-header-padding: var(--skeleton-config-header-padding, var(--x-skeleton-spacing-large-200));
        --x-skeleton-shell-header-background-image: var(--skeleton-config-header-background-image);
        --x-skeleton-shell-disclosure-inline-size: var(--x-skeleton-shell-inline-size);
        --x-skeleton-shell-disclosure-padding: var(--x-skeleton-spacing-large-100) var(--x-skeleton-spacing-large-200);
        --x-skeleton-shell-disclosure-display: block;
        --x-skeleton-shell-main-inline-size: var(--x-skeleton-shell-inline-size);
        --x-skeleton-shell-main-justify-content: center;
        --x-skeleton-shell-main-padding: var(--x-skeleton-spacing-large-200);
        --x-skeleton-shell-main-border: none;
        --x-skeleton-shell-order-summary-display: none;
        --x-skeleton-shell-order-summary-background-image: var(--skeleton-config-order-summary-background-image);
        --x-skeleton-box-shadow-extra-small:
            0 1px 1.75px 0 rgba(0, 0, 0, 0.12),
            0 -0.5px 1.5px 0 rgba(0, 0, 0, 0.09),
            0 3px 4px 0 rgba(0, 0, 0, 0.03);
        --x-skeleton-box-shadow-small:
            0 1px 2px -0.5px rgba(0, 0, 0, 0.05),
            0 2px 4px -1px rgba(0, 0, 0, 0.08),
            0 3px 6px -1.5px rgba(0, 0, 0, 0.08),
            0 -0.5px 1.5px 0 rgba(0, 0, 0, 0.09);
        @media screen and (min-width: 1000px) {
            --x-skeleton-shell-main-inline-size: 66rem;
            --x-skeleton-shell-order-summary-inline-size: 52rem;
            --x-skeleton-shell-section-columns-offset: 7rem;
            --x-skeleton-shell-content-display: grid;
            --x-skeleton-shell-content-template-areas: 'main order-summary';
            --x-skeleton-shell-content-template-columns: minmax(
                min-content, calc(50% + var(--x-skeleton-shell-section-columns-offset))
            )
            1fr;
            --x-skeleton-shell-inline-size: 118rem;
            --x-skeleton-shell-header-padding: var(--skeleton-config-header-padding, 0);
            --x-skeleton-shell-disclosure-display: none;
            --x-skeleton-shell-main-justify-content: flex-end;
            --x-skeleton-shell-main-padding: var(--x-skeleton-spacing-large-500);
            --x-skeleton-shell-main-border: 1px solid var(--x-skeleton-default-color-border);
            --x-skeleton-shell-order-summary-display: block;
            --x-skeleton-shell-order-summary-padding: var(--x-skeleton-spacing-large-500);
        }
    }
    @supports (width: min(0px, 100px)) {
        /* mobile header padding is clamped at large-200 like Sections */
        @media screen and (max-width: 999px) {
            .LoadingShell {
                --x-skeleton-shell-header-padding: min(
                    var(--skeleton-config-header-padding, var(--x-skeleton-spacing-large-200)),
                    var(--x-skeleton-spacing-large-200)
                );
            }
        }
    }
    @media screen and (min-width: 1000px) {
        .LoadingShell.LoadingShellConfig-Header-positionStart {
            --x-skeleton-shell-header-padding: var(--skeleton-config-header-padding,
            calc(var(--x-skeleton-spacing-large-500) * 2) var(--x-skeleton-spacing-large-500)
            var(--x-skeleton-spacing-large-500)
            );
        }
        .LoadingShell.LoadingShellConfig-Header-positionStart.LoadingShell-variantOneStepCheckout {
            --x-skeleton-shell-header-padding: var(--skeleton-config-header-padding, var(--x-skeleton-spacing-large-200) var(--x-skeleton-spacing-large-500));
        }
    }
    .LoadingShellHeader {
        grid-area: header;
    }
    .LoadingShellHeaderContent {
        padding: var(--x-skeleton-shell-header-padding);
        width: 100%;
        max-width: var(--x-skeleton-shell-header-inline-size);
    }
    @media screen and (min-width: 1000px) {
        .LoadingShell:not(.LoadingShellConfig-Header-positionStart) .LoadingShellHeader-positionStart {
            display: none;
        }
    }
    @media screen and (max-width: 999px) {
        .LoadingShellConfig-Header-positionInline .LoadingShellHeader-positionInline,
        .LoadingShellConfig-Header-positionInlineSecondary .LoadingShellHeader-positionInlineSecondary {
            display: none;
        }
        .LoadingShellConfig-Header-positionInlineSecondary .LoadingShellHeader-positionStart {
            background-image: var(
                --x-skeleton-shell-header-background-image,
                var(--x-skeleton-shell-order-summary-background-image)
            );
        }
    }
    .LoadingShellHeader-positionStart {
        display: flex;
        justify-content: center;
        border-bottom: 1px solid var(--x-skeleton-default-color-border);
        background-image: var(--x-skeleton-shell-header-background-image);
        background-position: 50% 50%;
        background-size: cover;
    }
    .LoadingShellHeader-uplift {
        z-index: 1;
        border-bottom: none;
        box-shadow: var(--x-skeleton-box-shadow-small);
    }
    .LoadingShellHeader-positionStart.LoadingShellHeader-hasBackgroundImage {
        --header-shop-name-color: #ffffff;
        --x-skeleton-default-color-accent: #ffffff;
    }
    .LoadingShellBuyerJourneyContent {
        width: 100%;
        width: var(--x-skeleton-shell-buyer-journey-inline-size);
        padding: var(--x-skeleton-shell-buyer-journey-padding);
    }
    .LoadingShellDisclosure {
        grid-area: disclosure;
        display: var(--x-skeleton-shell-disclosure-display);
        border-bottom: 1px solid var(--x-skeleton-default-color-border);
    }
    .LoadingShellDisclosure-uplift {
        border-bottom: none;
        box-shadow: var(--x-skeleton-box-shadow-extra-small);
    }
    .LoadingShellDisclosureButton {
        display: flex;
        justify-content: center;
        width: 100%;
    }
    .LoadingShellDisclosureButton {
        text-align: start;
        background: var(--x-skeleton-default-color-backgroundSubdued);
        color: var(--x-skeleton-default-color-accent);
        position: relative;
        z-index: 2;
    }
    .LoadingShellConfig-Shell-hasBackgroundImage .LoadingShellDisclosureButton {
        background: transparent;
        color: inherit;
    }
    .LoadingShellDisclosureButtonContent {
        display: grid;
        grid-template-columns: 1fr auto;
        gap: var(--x-skeleton-spacing-small-200);
        align-content: center;
        align-items: center;
    }
    .LoadingShellDisclosureButtonContent {
        padding: var(--x-skeleton-shell-disclosure-padding);
        width: 100%;
        max-width: var(--x-skeleton-shell-disclosure-inline-size);
    }
    .LoadingShellContent {
        grid-area: shell-content;
        display: var(--x-skeleton-shell-content-display);
        grid-template-areas: var(--x-skeleton-shell-content-template-areas);
        grid-template-columns: var(--x-skeleton-shell-content-template-columns);
    }
    .LoadingShellMain {
        grid-area: main;
        display: flex;
        justify-content: var(--x-skeleton-shell-main-justify-content);
        height: 100%;
    }
    .LoadingShellMain .LoadingShellMainContent {
        height: 100%;
        width: 100%;
        max-width: var(--x-skeleton-shell-main-inline-size);
        padding: var(--x-skeleton-shell-main-padding);
        border-inline-end: var(--x-skeleton-shell-main-border);
        display: grid;
        grid-template-rows: auto auto 1fr;
        grid-template-columns: 1fr;
        grid-template-areas:
      'header'
      'buyer-journey'
      'main-content-primary';
    }
    .LoadingShellMainContentPrimary {
        grid-area: main-content-primary;
    }
    .LoadingShellMainContent .LoadingShellHeader {
        margin-bottom: var(--x-skeleton-spacing-large-100);
    }
    .LoadingShellMainContent .LoadingShellBuyerJourney {
        margin-bottom: var(--x-skeleton-spacing-large-300);
    }
    .LoadingShell-variantOneStepCheckout .LoadingShellMainContent .LoadingShellHeader {
        margin-bottom: calc(var(--x-skeleton-spacing-large-300) * 2);
    }
    .LoadingShellOrderSummary {
        display: var(--x-skeleton-shell-order-summary-display);
        grid-area: order-summary;
    }
    .LoadingShellOrderSummary .LoadingShellOrderSummaryContent {
        position: sticky;
        padding: var(--x-skeleton-shell-order-summary-padding);
        width: 100%;
        max-width: var(--x-skeleton-shell-order-summary-inline-size);
        top: 0;
        right: auto;
        bottom: 0;
        left: auto;
    }
    .LoadingShellOrderSummaryContent .LoadingShellHeader {
        margin-bottom: var(--x-skeleton-spacing-large-200);
    }
    /* Header */
    .LoadingHeader {
        display: flex;
        width: 100%;
    }
    .LoadingHeader-alignmentStart {
        justify-content: flex-start;
    }
    .LoadingHeader-alignmentCenter {
        justify-content: center;
    }
    .LoadingHeader-alignmentEnd {
        justify-content: flex-end;
    }
    .LoadingShell-variantOneStepCheckout .LoadingHeader-alignmentCenter .LoadingHeaderHeading {
        display: flex;
        justify-content: center;
    }
    .LoadingShell-variantOneStepCheckout .LoadingHeader-alignmentEnd .LoadingHeaderHeading {
        display: flex;
        justify-content: flex-end;
    }

    ._7ozb2u6{
        margin-bottom: 10px;
    }
</style>
<div class="LoadingShell LoadingShellConfig-Header-positionStart LoadingShell-variantOneStepCheckout colorSchemeScheme1 backgroundColorBase">
    <header class="LoadingShellHeader LoadingShellHeader-containerFill LoadingShellHeader-positionStart">
        <div class="LoadingShellHeaderContent">
            <div class="LoadingHeader LoadingHeader-alignmentStart">
                <h1 class="LoadingHeaderHeading">{{ $config->web_title  }}</h1>
            </div>
        </div>
    </header>
    <div class="LoadingShellDisclosure ShopPay">
        <div class="LoadingShellDisclosureButton LoadingShellDisclosureButton-containerFill"><span class="LoadingShellDisclosureButtonContent FadeIn"><span class="Text Text--size-small"><span class="SkeletonText"><span class="SkeletonTextInner SkeletonTextInner--inline-size-base"><span></span></span></span></span><span><span class="Text Text--size-large"><span class="SkeletonText"><span class="SkeletonTextInner SkeletonTextInner--inline-size-small"><span></span></span></span></span></span></span></div>
    </div>
    <div class="LoadingShellContent LoadingShellContent-containerFill">
        <div class="LoadingShellMain">
            <div class="LoadingShellMainContent">
                <main class="LoadingShellMainContentPrimary FadeIn">
                    <div class="SkeletonExpressCheckout">
                        <div class="BlockStack BlockStack--spacing-base">
                            <div class="BlockStack BlockStack--inline-alignment-center BlockStack--spacing-base"><span class="Text"><span class="SkeletonText"><span class="SkeletonTextInner SkeletonTextInner--inline-size-base"><span></span></span></span></span></div>
                            <div class="SkeletonExpressCheckoutButtons">
                                <div class="SkeletonButton">
                                    <div class="SkeletonButtonInner"></div>
                                </div>
                                <div class="SkeletonButton">
                                    <div class="SkeletonButtonInner"></div>
                                </div>
                                <div class="SkeletonButton">
                                    <div class="SkeletonButtonInner"></div>
                                </div>
                            </div>
                        </div>
                        <div class="ExpressCheckoutDivider">
                            <div class="Divider"></div>
                        </div>
                    </div>
                    <div class="BlockStack BlockStack--spacing-large200">
                        <div class="BlockStack BlockStack--spacing-base">
                            <span class="Text Text--size-large"><span class="SkeletonText"><span class="SkeletonTextInner SkeletonTextInner--inline-size-small"><span></span></span></span></span>
                            <div class="BlockStack BlockStack--spacing-small300"><span class="Text Text--size-small"><span class="SkeletonText"><span class="SkeletonTextInner SkeletonTextInner--inline-size-full"><span></span></span></span></span><span class="Text Text--size-small"><span class="SkeletonText"><span class="SkeletonTextInner SkeletonTextInner--inline-size-full"><span></span></span></span></span></div>
                        </div>
                        <div class="Divider"></div>
                        <div class="BlockStack BlockStack--spacing-base">
                            <span class="Text Text--size-large"><span class="SkeletonText"><span class="SkeletonTextInner SkeletonTextInner--inline-size-small"><span></span></span></span></span>
                            <div class="BlockStack BlockStack--spacing-small300"><span class="Text Text--size-small"><span class="SkeletonText"><span class="SkeletonTextInner SkeletonTextInner--inline-size-full"><span></span></span></span></span><span class="Text Text--size-small"><span class="SkeletonText"><span class="SkeletonTextInner SkeletonTextInner--inline-size-full"><span></span></span></span></span></div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <div class="LoadingShellOrderSummary colorSchemeScheme2 backgroundColorBase">
            <div class="LoadingShellOrderSummaryContent">
                <aside class="LoadingShellOrderSummaryContentPrimary FadeIn">
                    <div class="BlockStack BlockStack--spacing-large200">
                        <h2 class="VisuallyHidden"></h2>
                        <div class="LoadingShellLineItems">
                            <div class="LoadingShellLine">
                                <div class="LoadingShellLineImageWrapper">
                                    <div class="SkeletonImage SkeletonImage--corner-radius-base"><span class="SkeletonImageInner"></span></div>
                                </div>
                                <div class="LoadingShellLineContent">
                                    <div class="BlockStack BlockStack--spacing-small500"><span class="Text Text--size-small"><span class="SkeletonText"><span class="SkeletonTextInner SkeletonTextInner--inline-size-base"><span></span></span></span></span><span class="Text Text--size-small"><span class="SkeletonText"><span class="SkeletonTextInner SkeletonTextInner--inline-size-small"><span></span></span></span></span></div>
                                </div>
                                <div class="LoadingShellLinePrice"><span class="Text Text--size-small"><span class="SkeletonText"><span class="SkeletonTextInner SkeletonTextInner--inline-size-small"><span></span></span></span></span></div>
                            </div>
                        </div>
                        <div class="BlockStack BlockStack--spacing-small100">
                            <div class="InlineStack InlineStack--spacing-base InlineStack--block-alignment-start InlineStack--inline-alignment-spaceBetween"><span class="Text Text--size-small"><span class="SkeletonText"><span class="SkeletonTextInner SkeletonTextInner--inline-size-small"><span></span></span></span></span><span class="Text Text--size-small"><span class="SkeletonText"><span class="SkeletonTextInner SkeletonTextInner--inline-size-small"><span></span></span></span></span></div>
                            <div class="InlineStack InlineStack--spacing-base InlineStack--block-alignment-start InlineStack--inline-alignment-spaceBetween"><span class="Text Text--size-small"><span class="SkeletonText"><span class="SkeletonTextInner SkeletonTextInner--inline-size-small"><span></span></span></span></span><span class="Text Text--size-small"><span class="SkeletonText"><span class="SkeletonTextInner SkeletonTextInner--inline-size-small"><span></span></span></span></span></div>
                            <div class="InlineStack InlineStack--spacing-base InlineStack--block-alignment-start InlineStack--inline-alignment-spaceBetween"><span class="Text Text--size-small"><span class="SkeletonText"><span class="SkeletonTextInner SkeletonTextInner--inline-size-small"><span></span></span></span></span><span class="Text Text--size-small"><span class="SkeletonText"><span class="SkeletonTextInner SkeletonTextInner--inline-size-small"><span></span></span></span></span></div>
                            <div class="InlineStack InlineStack--spacing-base InlineStack--block-alignment-start InlineStack--inline-alignment-spaceBetween"><span class="Text Text--size-large"><span class="SkeletonText"><span class="SkeletonTextInner SkeletonTextInner--inline-size-small"><span></span></span></span></span><span class="Text Text--size-large"><span class="SkeletonText"><span class="SkeletonTextInner SkeletonTextInner--inline-size-small"><span></span></span></span></span></div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdn.shopify.com/shopifycloud/checkout-web/assets/c1.en/assets/app.Bq0sGAT6.css" crossorigin fetchPriority="high" integrity="sha384-l7UMdwhvQxGjFsMbzAlCR33GNOnP1P2pa7nmlA3zaSR8lCkE6F5uRTyTZMbG7hEz"/>
<link rel="stylesheet" href="https://cdn.shopify.com/shopifycloud/checkout-web/assets/c1.en/assets/OnePage.PMX4OSBO.css" crossorigin fetchPriority="high" integrity="sha384-fXxzBn5U+tPzlLziVftrFozIo44RXz+ILhGMI0pxK2OFG0IIb9IDI/JhLVtlPgpw"/>
<link rel="stylesheet" href="https://cdn.shopify.com/shopifycloud/checkout-web/assets/c1.en/assets/DeliveryMethodSelectorSection.DmqjTkNB.css" crossorigin fetchPriority="high" integrity="sha384-WE9mMSSTIPqRgp48SqCveBxJDL8czc063ouaF9zf3wgZIC1hvpA9jdG/oVJ113tK"/>
<link rel="stylesheet" href="https://cdn.shopify.com/shopifycloud/checkout-web/assets/c1.en/assets/useEditorShopPayNavigation.DCOTvxC3.css" crossorigin fetchPriority="high" integrity="sha384-X/YzdS3hddk0DqXAgzzrK66heaZRe+ilSSW6Q666YtqAE+MVJ3+SsO8Ur1dfy4u5"/>
<link rel="stylesheet" href="https://cdn.shopify.com/shopifycloud/checkout-web/assets/c1.en/assets/VaultedPayment.OxMVm7u-.css" crossorigin fetchPriority="high" integrity="sha384-ZZgULcXIx8Z9zr9ZA1MLZctJEtkQTSwwBc2N7WYoWNZkPiMYDx3mGNDEFflydb2k"/>
<link rel="stylesheet" href="https://cdn.shopify.com/shopifycloud/checkout-web/assets/c1.en/assets/StackedMerchandisePreview.CKAakmU8.css" crossorigin fetchPriority="high" integrity="sha384-rjvDhaOig7WftE7Gr282PJ+SONOv0I+viBo35zE2EAEjdFRCPRK8lj9DSJqyylu6"/>
<link rel="stylesheet" href="https://cdn.shopify.com/shopifycloud/checkout-web/assets/c1.en/assets/ShopPayVerificationSwitch.DW7NMDXG.css" crossorigin fetchPriority="high" integrity="sha384-mbvKfRNVpj990WjCXT9x4DHmAC43TpVZviT1nSBTbrTiynqSn+rILBYz0ul6tFym"/>





<meta name="serialized-session-token" content="&quot;andYdjZtUHJmaUZsRWdRRU02SDIzcHRzUlVtWUtDOXlBM3BxYjU2TmIyMzNWSklML2JQQTJna3RKU21aUnJ1TnovQml2RVlBbTBOMlBXWFM5OGxwcktSdml0b1p0V2Fwa3grMkVzZHpvM20rRWVWVEhJM0dWeGlxRDJKamVWRXRwRm1OMUZVUGNtdTY4Nmc1bWNJNFgwR1hvWG11YmF0SmtKY0R1cUhMSEM4M2t1a1dOTGt5aE5lL1pac0dUTmYyMTU0VGVyLzNMZ00rMDEzWno0bHpFdnh0NVlrQkx0TUp2MWhBL2UrLzhwcWlFaS9ET05kZ0FUWlBRVGJwL3lIdHFKQVQrR01wYWtvVjJqSmFMSUpKT1NCMlFMRVdOc1UxUjNDeU1OM0RGUVdjNU1ndjZ0YTktLU5EVC9IZU1hTEVrR2JhZ1AtLTNvaFJIMkZwdVJUejRrYkNOeWpZN2c9PQ&quot;"/>
<meta name="serialized-source-token" content="&quot;Z2NwLWFzaWEtc291dGhlYXN0MTowMUpRS0owNkQ4QzZOWkFWUjNKSDRXSkM2UA&quot;"/>
<meta name="serialized-checkout-session-identifier" content="&quot;e02ac6b0afa5aaf089ebfe6f1b4bd743&quot;"/>
<meta name="serialized-graphql-endpoint" content="&quot;https://mymonsteraudio.com/checkouts/unstable/graphql&quot;"/>
<meta name="serialized-deploy-stage" content="&quot;production&quot;"/>
<meta name="serialized-client-bundle-info" content="{&quot;browsers&quot;:&quot;latest&quot;,&quot;format&quot;:&quot;es&quot;,&quot;locale&quot;:&quot;en&quot;,&quot;sha&quot;:&quot;ef6c318e526e0d6670467eefc16f5b2d7cc4defc&quot;}"/>
<meta name="serialized-public-path" content="&quot;https://cdn.shopify.com/shopifycloud/checkout-web/assets/&quot;"/>
<meta name="serialized-receipt" content="{&quot;id&quot;:null,&quot;exists&quot;:false,&quot;inProgress&quot;:false,&quot;orderStatusPageUrl&quot;:null,&quot;shopPay&quot;:false,&quot;processingErrorFailure&quot;:null,&quot;purchaseOrder&quot;:null,&quot;latestReceipt&quot;:{&quot;__typename&quot;:&quot;ReceiptNotFound&quot;}}"/>
<meta name="serialized-request-id" content="&quot;92aa4a18eca7dd62&quot;"/>
<meta name="serialized-server-handling" content="&quot;fast&quot;"/>
<meta name="serialized-server-render" content="&quot;yes&quot;"/>
<meta name="serialized-worker-version" content="&quot;fast&quot;"/>
<meta name="serialized-session-finished" content="false"/>
<meta name="serialized-api-client-id" content="580111"/>
<meta name="serialized-redesign-enabled" content="true"/>
<meta name="serialized-shop" content="{&quot;id&quot;:&quot;gid://shopify/Shop/31987892355&quot;,&quot;name&quot;:&quot;{{ $config->web_title }}&quot;,&quot;domain&quot;:&quot;mymonsteraudio.com&quot;,&quot;myshopifyDomain&quot;:&quot;mymonsteraudio.myshopify.com&quot;,&quot;origins&quot;:[&quot;https://mymonsteraudio.myshopify.com&quot;,&quot;https://mymonsteraudio.com&quot;,&quot;https://www.mymonsteraudio.com&quot;,&quot;https://mymonsteraudio.account.myshopify.com&quot;]}"/>
<meta name="serialized-login-url" content="&quot;https://mymonsteraudio.com/account/login?checkout_url=%2Fcheckouts%2Fcn%2FZ2NwLWFzaWEtc291dGhlYXN0MTowMUpRS0owNkQ4QzZOWkFWUjNKSDRXSkM2UA%3Fcompany_location_id%26locale%3Den-VN&quot;"/>
<meta name="serialized-logout-url" content="&quot;https://mymonsteraudio.com/account/logout?return_url=%2Fcheckouts%2Fcn%2FZ2NwLWFzaWEtc291dGhlYXN0MTowMUpRS0owNkQ4QzZOWkFWUjNKSDRXSkM2UA%3Fcompany_location_id%3D%26locale%3Den-VN&quot;"/>
<meta name="serialized-invoice-login-type" content="null"/>
<meta name="serialized-experiments" content="[{&quot;clientHandle&quot;:&quot;e_bf227cfbfe18b1093d773233402027b1&quot;,&quot;variant&quot;:null}]"/>
<meta name="serialized-extensions-assets-path" content="&quot;https://extensions.shopifycdn.com/shopifycloud/checkout-web/assets/&quot;"/>
<meta name="serialized-renderer" content="&quot;cloudflare&quot;"/>
<div id="app" ng-app="App" ng-controller="checkout" ng-cloak>
    <div style="--swn0j0:rgb(240,196,23);--swn0j1:rgb(0,0,0);--swn0j2:rgb(208,169,18);--swn0j3:rgb(255,252,246);--swn0j4:rgb(255,245,228);--swn0j5:rgb(255,236,198);--swn0j8:rgb(111,104,90);--swn0j9:rgb(26,26,26);--swn0jb:rgb(0,0,0);--swn0ja:rgb(0,0,0);--swn0jc:rgb(255,255,255);--swn0jd:rgb(255,255,255);--swn0j1z:rgba(240,196,23,0.05);--swn0j2o:rgba(240,196,23,0.05);--swn0j39:rgba(240,196,23,0.05);--swn0j5c:rgba(240,196,23,0.05);--swn0j61:rgba(240,196,23,0.05);--swn0j6m:rgba(240,196,23,0.05);--swn0j8p:rgba(240,196,23,0.05);--swn0j9e:rgba(240,196,23,0.05);--swn0j9z:rgba(240,196,23,0.05);--swn0jc2:rgba(240,196,23,0.05);--swn0jcr:rgba(240,196,23,0.05);--swn0jdc:rgba(240,196,23,0.05);">
        <div class="g9gqqf1 g9gqqf0 _1fragemo8 g9gqqfc g9gqqfa _1fragemth g9gqqf6 g9gqqf2 _1fragemni _1fragemnm">
            <h1 class="n8k95wf _1fragemsk">{{ $config->web_title }}</h1>
            <div class="cm5pp U3Rye FeQiM oYrwu _1fragemnm _1fragemni _1fragemth">
                <header class="EAjaz _8wrz5 d5pfT _1fragemth _1fragemnm _1fragemni">
                    <div class="i8Dpn">
                        <div>
                            <div>
                                <div class="_1ip0g651 _1ip0g650 _1fragemlt _1fragem41 _1fragem5u _1fragem2s">
                                    <div style="--_16s97g7a:1fr;--_16s97g7k:minmax(0, 1fr);--_16s97g71e:minmax(0, 1fr) minmax(auto, max-content);--_16s97g71o:minmax(0, 1fr);" class="_1mrl40q0 _1fragemlt _1fragem4l _1fragem6e _1fragemmi _1fragemmn _1fragem2s _1fragemmd _16s97g7f _16s97g7p _16s97g71j _16s97g71t    _16s97g79l">
                                        <span><a href="https://mymonsteraudio.com" class="s2kwpi1 s2kwpi0 _1fragemlt _1fragemsy _1fragemt4 _1fragemss s2kwpi3 s2kwpi7 s2kwpi5 _1fragemso"><span class="pJt3c"><span class="n8k95w1 n8k95w0 _1fragemlt n8k95w2">
                                                        {{ $config->web_title }}</span></span></a></span>
                                        <span>
                      <a aria-label="Cart" id="cart-link" href="https://mymonsteraudio.com/cart?logged_in=true" class="s2kwpi1 s2kwpi0 _1fragemlt _1fragemsy _1fragemt4 _1fragemss s2kwpi2 s2kwpi6 s2kwpi4 _1fragemsp">
                        <span class="a8x1wu2 a8x1wu1 _1fragemor _1fragem1t _1fragemkp _1fragemkf a8x1wug a8x1wuj a8x1wuh _1fragem1y a8x1wup a8x1wul a8x1wut">
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14" focusable="false" aria-hidden="true" class="a8x1wuv a8x1wuu _1fragem1y _1fragemor _1fragemkp _1fragemkf _1fragemny">
                            <path d="m2.007 10.156.387-4.983a1 1 0 0 1 .997-.923h7.218a1 1 0 0 1 .997.923l.387 4.983c.11 1.403-1.16 2.594-2.764 2.594H4.771c-1.605 0-2.873-1.19-2.764-2.594"></path>
                            <path d="M5 3.5c0-1.243.895-2.25 2-2.25S9 2.257 9 3.5V5c0 1.243-.895 2.25-2 2.25S5 6.243 5 5z"></path>
                          </svg>
                        </span>
                      </a>
                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <aside class="nMPKH iYA3J">
                    <button aria-controls="disclosure_details" aria-expanded="false" class="WtpiW">
            <span class="smIFm">
              <span class="_4ptW6">
                <span class="fCEli">Order summary</span>
                <span class="a8x1wu2 a8x1wu1 _1fragemor _1fragem1t _1fragemkp _1fragemkf a8x1wug a8x1wuk a8x1wui _1fragem2i _1fragemta a8x1wum a8x1wul a8x1wut">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14" focusable="false" aria-hidden="true" class="a8x1wuv a8x1wuu _1fragem1y _1fragemor _1fragemkp _1fragemkf _1fragemny">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.75 7.354 9.396a.5.5 0 0 1-.708 0L2 4.75"></path>
                  </svg>
                </span>
              </span>
              <span>
                <div class="_1ip0g651 _1ip0g650 _1fragemlt _1fragem4v _1fragem6o _1fragem2s _1fragemou">
                  <span class="_19gi7yt1z _19gi7yt1y _1fragemsk">Original price</span>
                  <p class="_1tx8jg70 _1fragemlt _1tx8jg7g _1tx8jg7f _1fragemoa _1tx8jg71a _1tx8jg71q notranslate"><strong class="_19gi7yt0 _19gi7yt19 _19gi7yt1x">$645.00</strong></p>
                </div>
              </span>
            </span>
                    </button>
                </aside>
                <div class="Sxi8I">
                    <div class="_9F1Rf GI5Fn _1fragemnm _1fragemnh _1fragemtp">
                        <div class="gdtca">
                            <main id="checkout-main" class="djSdi">
                                <div class="_1ip0g651 _1ip0g650 _1fragemlt _1fragem4v _1fragem47 _1fragem6o _1fragem60 _1fragem2s">
                                    <form action method="POST" novalidate id="Form286" class="km09ry0 _1fragem23">
                                        <div class="km09ry1 _1fragemlt">
                                            <div>
                                                <section class="_197l2ofi _197l2ofg _1fragemnm _197l2ofp _197l2ofk _1fragemni _1fragemth _1fragem1y _1fragemf5 _1fragemg5 _1fragemh8 _1fragemhy _1fragemdc _1fragemec _1fragemj1 _1fragemjr _1fragemlt">
                                                </section>
                                                <div class="_1fragem1y _1fragemlt gfFXW">
                                                    <div class="_16s97g74v _16s97g760"></div>
                                                </div>
                                            </div>
                                            <div>
                                                <div>
                                                    <section class="_197l2ofi _197l2ofg _1fragemnm _197l2ofp _197l2ofk _1fragemni _1fragemth _1fragem1y _1fragemf5 _1fragemg5 _1fragemh8 _1fragemhy _1fragemdc _1fragemec _1fragemj1 _1fragemjr _1fragemlt">
                                                        <div class="_1ip0g651 _1ip0g650 _1fragemlt _1fragem3w _1fragem5p _1fragem2s">
                                                            <div class="_1ip0g651 _1ip0g650 _1fragemlt _1fragem3c _1fragem55 _1fragem2s">
                                                                <h2 id="deliveryAddress" class="n8k95w1 n8k95w0 _1fragemlt n8k95w2">Thông tin thanh toán</h2>
                                                            </div>
                                                            <div class="_1ip0g651 _1ip0g650 _1fragemlt _1fragem4b _1fragem64 _1fragem2s">
                                                                <section aria-label="Shipping address" class="_1fragem1y _1fragemlt">
                                                                    <div class="_1ip0g651 _1ip0g650 _1fragemlt _1fragem3w _1fragem5p _1fragem2s">
                                                                        <div class="_1ip0g651 _1ip0g650 _1fragemlt _1fragem4b _1fragem64 _1fragem2s">
                                                                            <div class="_1ip0g651 _1ip0g650 _1fragemlt _1fragem3w _1fragem5p _1fragem2s">
                                                                                <div>
                                                                                    <div id="shippingAddressForm">
                                                                                        <div aria-hidden="false" aria-busy="false" class="r62YW">
                                                                                            <div class="_1ip0g651 _1ip0g650 _1fragemlt _1fragem3w _1fragem5p _1fragem2s">
                                                                                                <div style="--_16s97g7a:minmax(0, 1fr);--_16s97g7k:minmax(auto, max-content);--_16s97g71e:minmax(0, 1fr);--_16s97g71o:minmax(auto, max-content);" class="_1mrl40q0 _1fragemlt _1fragem3w _1fragem5p _1fragem2s _1fragemmd _1fragemm9 _16s97g7f _16s97g7p _16s97g71j _16s97g71t">
                                                                                                    <div class="RD23h _1k3449n1 _1k3449n0 _1fragemnn _10vrn9p1 _10vrn9p0 _10vrn9p4">
                                                                                                        <div style="--_16s97g7a:minmax(0, 1fr);--_16s97g7k:minmax(auto, max-content);--_16s97g71e:minmax(0, 1fr);--_16s97g71o:minmax(auto, max-content);" class="_1mrl40q0 _1fragemlt _1fragem3w _1fragem5p _1fragem2s _1fragemmd _1fragemm9 _16s97g7f _16s97g7p _16s97g71j _16s97g71t">
                                                                                                            <div class="wfKnD">
                                                                                                                <div class="_1ip0g651 _1ip0g650 _1fragemlt _1fragem3m _1fragem5f _1fragem2s">
                                                                                                                    <div class="_7ozb2u2 _7ozb2u1 _1fragem3c _1fragem55 _1fragemlt _1fragem2s _10vrn9p1 _10vrn9p0 _10vrn9p4 _7ozb2u4 _7ozb2u3 _1fragemnn">
                                                                                                                        <div class="cektnc0 _1fragemlt cektnc5">
                                                                                                                            <label id="TextField841-label" for="TextField841" class="cektnc3 cektnc1 _1fragemlj _1fragemsj _1fragemtc _1fragemsy _1fragemst _1fragemt8 _1fragemt9"><span class="cektnca"><span class="rermvf1 rermvf0 _1fragemk0 _1fragemka _1fragem1y">Họ tên</span></span></label>
                                                                                                                            <div class="_7ozb2u6 _7ozb2u5 _1fragemlt _1fragem2s _1fragemnx _1fragemsy _1fragemst _1fragemt8 _1fragemtb _7ozb2uc _7ozb2ua _1fragemnn _1fragemth _7ozb2ul _7ozb2uh"><input id="TextField841" name="customer_name"  ng-model="form.customer_name" placeholder="Họ tên" required type="text" aria-required="true" aria-labelledby="TextField841-label" value autocomplete="shipping address-line1" class="_7ozb2uq _7ozb2up _1fragemlt _1fragemtc _1fragemor _1fragemsi _7ozb2ut _7ozb2us _1fragemsy _1fragemst _1fragemt8 _7ozb2u11 _7ozb2u1h _7ozb2ur"/></div>
                                                                                                                            <span class="invalid-feedback d-block" role="alert">
                                                                        <strong><% errors.customer_name[0] %></strong>
                                                                  </span>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div style="--_16s97g7a:minmax(0, 1fr);--_16s97g7k:minmax(auto, max-content);--_16s97g71e:minmax(0, 1fr);--_16s97g71o:minmax(auto, max-content);" class="_1mrl40q0 _1fragemlt _1fragem3w _1fragem5p _1fragem2s _1fragemmd _1fragemm9 _16s97g7f _16s97g7p _16s97g71j _16s97g71t">
                                                                                                            <div class="_7ozb2u2 _7ozb2u1 _1fragem3c _1fragem55 _1fragemlt _1fragem2s _10vrn9p1 _10vrn9p0 _10vrn9p4 _7ozb2u4 _7ozb2u3 _1fragemnn">
                                                                                                                <div class="cektnc0 _1fragemlt cektnc5">
                                                                                                                    <label id="TextField842-label" for="TextField842" class="cektnc3 cektnc1 _1fragemlj _1fragemsj _1fragemtc _1fragemsy _1fragemst _1fragemt8 _1fragemt9"><span class="cektnca"><span class="rermvf1 rermvf0 _1fragemk0 _1fragemka _1fragem1y">Địa chỉ</span></span></label>
                                                                                                                    <div class="_7ozb2u6 _7ozb2u5 _1fragemlt _1fragem2s _1fragemnx _1fragemsy _1fragemst _1fragemt8 _1fragemtb _7ozb2uc _7ozb2ua _1fragemnn _1fragemth _7ozb2ul _7ozb2uh">
                                                                                                                        <input id="TextField842" name="address2" ng-model="form.customer_address" placeholder="Địa chỉ giao hàng" type="text" aria-required="false" aria-labelledby="TextField842-label" value autocomplete="shipping address-line2" class="_7ozb2uq _7ozb2up _1fragemlt _1fragemtc _1fragemor _1fragemsi _7ozb2ut _7ozb2us _1fragemsy _1fragemst _1fragemt8 _7ozb2u11 _7ozb2u1h _7ozb2ur"/></div>
                                                                                                                    <span class="invalid-feedback d-block" role="alert">
                                                                        <strong><% errors.customer_address[0] %></strong>
                                                                  </span>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div style="--_16s97g7a:minmax(0, 1fr);--_16s97g7k:minmax(auto, max-content);--_16s97g71e:minmax(0, 1fr);--_16s97g71o:minmax(auto, max-content);" class="_1mrl40q0 _1fragemlt _1fragem3w _1fragem5p _1fragem2s _1fragemmd _1fragemm9 _16s97g7f _16s97g7p _16s97g71j _16s97g71t">
                                                                                                            <div class="_7ozb2u2 _7ozb2u1 _1fragem3c _1fragem55 _1fragemlt _1fragem2s _10vrn9p1 _10vrn9p0 _10vrn9p4 _7ozb2u4 _7ozb2u3 _1fragemnn">
                                                                                                                <div class="cektnc0 _1fragemlt cektnc5">
                                                                                                                    <label id="TextField842-label" for="TextField842" class="cektnc3 cektnc1 _1fragemlj _1fragemsj _1fragemtc _1fragemsy _1fragemst _1fragemt8 _1fragemt9"><span class="cektnca"><span class="rermvf1 rermvf0 _1fragemk0 _1fragemka _1fragem1y">Số điện thoại</span></span></label>
                                                                                                                    <div class="_7ozb2u6 _7ozb2u5 _1fragemlt _1fragem2s _1fragemnx _1fragemsy _1fragemst _1fragemt8 _1fragemtb _7ozb2uc _7ozb2ua _1fragemnn _1fragemth _7ozb2ul _7ozb2uh"><input id="TextField842" name="phone_number" ng-model="form.customer_phone" placeholder="Số điện thoại" type="text" aria-required="false" aria-labelledby="TextField842-label" value autocomplete="shipping address-line2" class="_7ozb2uq _7ozb2up _1fragemlt _1fragemtc _1fragemor _1fragemsi _7ozb2ut _7ozb2us _1fragemsy _1fragemst _1fragemt8 _7ozb2u11 _7ozb2u1h _7ozb2ur"/></div>
                                                                                                                    <span class="invalid-feedback d-block" role="alert">
                                                                        <strong><% errors.customer_phone[0] %></strong>
                                                                  </span>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div style="--_16s97g7a:minmax(0, 1fr);--_16s97g7k:minmax(auto, max-content);--_16s97g71e:minmax(0, 1fr);--_16s97g71o:minmax(auto, max-content);" class="_1mrl40q0 _1fragemlt _1fragem3w _1fragem5p _1fragem2s _1fragemmd _1fragemm9 _16s97g7f _16s97g7p _16s97g71j _16s97g71t">
                                                                                                            <div class="_7ozb2u2 _7ozb2u1 _1fragem3c _1fragem55 _1fragemlt _1fragem2s _10vrn9p1 _10vrn9p0 _10vrn9p4 _7ozb2u4 _7ozb2u3 _1fragemnn">
                                                                                                                <div class="cektnc0 _1fragemlt cektnc5">
                                                                                                                    <label id="TextField842-label" for="TextField842" class="cektnc3 cektnc1 _1fragemlj _1fragemsj _1fragemtc _1fragemsy _1fragemst _1fragemt8 _1fragemt9"><span class="cektnca"><span class="rermvf1 rermvf0 _1fragemk0 _1fragemka _1fragem1y">Email</span></span></label>
                                                                                                                    <div class="_7ozb2u6 _7ozb2u5 _1fragemlt _1fragem2s _1fragemnx _1fragemsy _1fragemst _1fragemt8 _1fragemtb _7ozb2uc _7ozb2ua _1fragemnn _1fragemth _7ozb2ul _7ozb2uh">
                                                                                                                        <input id="TextField842" name="email"
                                                                                                                               ng-model="form.customer_email"
                                                                                                                               placeholder="Email" type="text"
                                                                                                                               aria-required="false" aria-labelledby="TextField842-label" value autocomplete="shipping address-line2" class="_7ozb2uq _7ozb2up _1fragemlt _1fragemtc _1fragemor _1fragemsi _7ozb2ut _7ozb2us _1fragemsy _1fragemst _1fragemt8 _7ozb2u11 _7ozb2u1h _7ozb2ur"/></div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                        <div style="--_16s97g7a:minmax(0, 1fr);--_16s97g7k:minmax(auto, max-content);--_16s97g71e:minmax(0, 1fr);--_16s97g71o:minmax(auto, max-content);" class="_1mrl40q0 _1fragemlt _1fragem3w _1fragem5p _1fragem2s _1fragemmd _1fragemm9 _16s97g7f _16s97g7p _16s97g71j _16s97g71t">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div><div><div>
                                                                                        <div class="_1fragem1y _1fragemlt"><div class="_1ip0g651 _1ip0g650 _1fragemlt _1fragem4g _1fragem69 _1fragem2s"><div class="_1ip0g651 _1ip0g650 _1fragemlt _1fragem3w _1fragem5p _1fragem2s"></div><div class="_1ip0g651 _1ip0g650 _1fragemlt _1fragem46 _1fragem5z _1fragem2s">
                                                                                                    <div><div class="_1ip0g651 _1ip0g650 _1fragemlt _1fragem3w _1fragem5p _1fragem2s">
                                                                                                            <div>
                                                                                                                <button  id="checkout-pay-button" type="button" ng-click="submitOrder()" class="_1m2hr9ge _1m2hr9gd _1fragemt9 _1fragemlt _1fragemnw _1fragem2i _1fragemsn _1fragemt2 _1fragemt4 _1fragemst _1m2hr9g18 _1m2hr9g15 _1fragemss _1fragemsh _1m2hr9g1t _1m2hr9g1r _1m2hr9g11  _1m2hr9g1q _1m2hr9g14 _1m2hr9g13 _1fragems1 _1m2hr9g2c _1m2hr9g2b  _1fragemso"><span class="_1m2hr9gr _1m2hr9gq _1fragemsj _1fragemsy _1fragemss _1fragemt5 _1m2hr9gn _1m2hr9gl _1fragem28 _1fragem6t _1fragemsl">
                                                                                                                        <span class="_19gi7yt0 _19gi7yti _19gi7yth _1fragemo9 _19gi7yt19 _19gi7yt1t">Đặt hàng</span>
                                                                                                                    </span>
                                                                                                                </button>

                                                                                                                <style>
                                                                                                                    .separator {
                                                                                                                        display: inline-block;
                                                                                                                        position: relative;
                                                                                                                        padding: 0 1rem;
                                                                                                                        color: #6c757d;
                                                                                                                        font-weight: 500;
                                                                                                                        font-size: 1.2rem;
                                                                                                                    }

                                                                                                                    .separator::before,
                                                                                                                    .separator::after {
                                                                                                                        content: "";
                                                                                                                        position: absolute;
                                                                                                                        top: 50%;
                                                                                                                        width: 30px;
                                                                                                                        height: 1px;
                                                                                                                        background: #dee2e6;
                                                                                                                    }

                                                                                                                    .separator::before {
                                                                                                                        left: 0;
                                                                                                                        transform: translateX(-100%);
                                                                                                                    }

                                                                                                                    .separator::after {
                                                                                                                        right: 0;
                                                                                                                        transform: translateX(100%);
                                                                                                                    }
                                                                                                                </style>

                                                                                                                <div style="text-align: center">
                                                                                                                    <span class="mx-3 separator">Hoặc thanh toán qua</span>
                                                                                                                </div>


                                                                                                                <div id="paypal-button-container" style="margin-top: 1rem;"></div>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="_16s97g75k">

                                                                                            </div>
                                                                                            <div class="_197l2oft _1fragemnz _1fragemmn _1fragem28 _1fragemlt"></div>
                                                                                            <div class="_1fragem32 _1fragem20 _1fragemlt">
                                                                                                <div class="_16s97g75f"></div></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                </section>
                                                            </div>
                                                        </div>
                                                    </section>
                                                    <div class="_1fragem1y _1fragemlt gfFXW">
                                                        <div class="_16s97g74v _16s97g760"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="_197l2of1e _1fragemsk _1fragem1y _1fragemlt"><button type="submit" tabindex="-1" aria-hidden="true">Submit</button></div>
                                    </form>
                                </div>
                            </main>
                            <footer class="NGRNe GTe1e _1fragemnm">
                                <div class="QiTI2">
                                    <div>
                                        <div class="_1ip0g651 _1ip0g650 _1fragemlt _1fragem41 _1fragem5u _1fragem2s">
                                            <div class="_5uqybw0 _1fragemlt _1fragem28 _1fragem78">
                                                <div class="_5uqybw1 _1fragem28 _1fragemku _1fragemo5 _1fragemmk _1fragemmq _1fragem3c _1fragem5p _1fragem78"><button type="button" class="_1m2hr9ge _1m2hr9gd _1fragemt9 _1fragemlt _1fragemnw _1fragem2i _1fragemsn _1fragemt2 _1fragemt4 _1fragemst _1m2hr9g1a _1m2hr9g17 _1fragemt4 _1fragemt2 _1fragemss _1fragemsh _1m2hr9g1q _1m2hr9g1e _1m2hr9g1c _1fragemsp"><span class="_1m2hr9gr _1m2hr9gq _1fragemsj _1fragemsy _1fragemss _1fragemt5 _1m2hr9gn _1m2hr9gl _1fragem28 _1fragem6t _1fragemsl">Privacy policy</span></button></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </footer>
                        </div>
                    </div>
                    <div class="i4DWM _1fragemnm _1fragemnj _1fragemth">
                        <div class="_4QenE">
                            <aside>
                                <div>
                                    <section class="_1fragem1y _1fragemlt">
                                        <div class="_1ip0g651 _1ip0g650 _1fragemlt _1fragem46 _1fragem5z _1fragem2s">
                                            <h2 class="n8k95wf _1fragemsk">Order summary</h2>
                                            <div class="_1ip0g651 _1ip0g650 _1fragemlt _1fragem46 _1fragem5z _1fragem2s">
                                                <section class="_1fragem1y _1fragemlt">
                                                    <div style="--_16s97g73f:40vh;" class="_1mjy8kn6 _1fragemlt _16s97g73k">
                                                        <div style="--_16s97g73f:40vh;" tabindex="0" role="group" scrollBehaviour="chain" class="_1mjy8kn1 _1mjy8kn0 _1fragemlt _1fragemor _1fragem1t _1fragemeq _1fragemhx _1fragemcn _1fragemjq _16s97g73k _1mjy8kn4 _1mjy8kn2 _1fragemjv _1fragemka">
                                                            <div class="_6zbcq520 _1fragemsk">
                                                                <h3 id="ResourceList162" class="n8k95w1 n8k95w0 _1fragemlt n8k95w4">Shopping cart</h3>
                                                            </div>
                                                            <div role="table" aria-labelledby="ResourceList162" class="_6zbcq56 _6zbcq55 _1fragem28 _1fragemnz _6zbcq5o _6zbcq5c _1fragem3w _6zbcq516">
                                                                <div role="rowgroup" class="_6zbcq54 _6zbcq53 _1fragem28 _1fragemnz _6zbcq51d _6zbcq51c _1fragemsk">
                                                                    <div role="row" class="_6zbcq51f _6zbcq51e _1fragem28 _1fragemmn _1fragemor _1fragem5p">
                                                                        <div role="columnheader" class="_6zbcq520 _1fragemsk">Product image</div>
                                                                        <div role="columnheader" class="_6zbcq520 _1fragemsk">Description</div>
                                                                        <div role="columnheader" class="_6zbcq520 _1fragemsk">Quantity</div>
                                                                        <div role="columnheader" class="_6zbcq520 _1fragemsk">Price</div>
                                                                    </div>
                                                                </div>
                                                                <div role="rowgroup" class="_6zbcq54 _6zbcq53 _1fragem28 _1fragemnz">

                                                                    @foreach($cartCollection as $item)
                                                                        <div role="row" class="_6zbcq51i _6zbcq51h _1fragem28 _1fragem1t _6zbcq51l _6zbcq510 _6zbcq51k">
                                                                            <div role="cell" class="_6zbcq51z _6zbcq51y _1fragem28 _1fragemnz _6zbcq51t _6zbcq51q _1fragem78 _6zbcq51o">
                                                                                <div style="--_1m6j2n30:1;" class="_1m6j2n34 _1m6j2n33 _1fragemlt _1fragemtl _1m6j2n3a _1m6j2n39 _1m6j2n35">
                                                                                    <picture>
                                                                                        <source media="(min-width: 0px)"/>
                                                                                        <img src="{{ $item->attributes->image }}" loading="eager" alt="{{ $item->name }}" class="_1h3po424 _1h3po427 _1h3po425 _1fragem1y _1fragemkp _1fragemp3 _1fragemp1 _1fragemp5 _1fragemoz _1fragemp9 _1fragempf _1fragempr _1fragempl _1fragemq4 _1fragemq0 _1fragemq8 _1fragempw _1fragemb9 _1fragemak _1fragemby _1fragem9v _1frageml4 _1m6j2n3c _1fragemor _1fragem1t _1m6j2n35"/>
                                                                                    </picture>
                                                                                    <div class="_1m6j2n3m _1m6j2n3l _1fragemlj">
                                                                                        <div class="_99ss3s1 _99ss3s0 _1fragem2n _1fragemmn _1fragem6t _99ss3s7 _99ss3s4 _99ss3s2 _1fragemic _1fragemgj _99ss3sk _99ss3sf _1fragempb _1fragemph _1fragempt _1fragempn"><span class="_99ss3sm _1fragemsk">Số lượng</span><span>{{ $item->quantity }}</span></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div role="cell" style="--_16s97g73w:6.4rem;" class="_6zbcq51z _6zbcq51y _1fragem28 _1fragemnz _6zbcq51u _6zbcq51r _1fragem6t _6zbcq51p _6zbcq51n _1fragemmt _6zbcq51w _1fragemo2 _16s97g741">
                                                                                <div class="_1fragem1y _1fragemlt dDm6x">
                                                                                    <p class="_1tx8jg70 _1fragemlt _1tx8jg7c _1tx8jg7b _1fragemo8 _1tx8jg71a _1tx8jg71q">{{ $item->name }}</p>

                                                                                    <div class="_1ip0g651 _1ip0g650 _1fragemlt _1fragem4v _1fragem6o _1fragem2s">
                                                                                        <p class="_1tx8jg70 _1fragemlt _1tx8jg7a _1tx8jg79 _1fragemo7 _1tx8jg71b _1tx8jg71q">
                                                                                           {{ $item->attributes->size }} - {{ $item->attributes->color }}
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div role="cell" class="_6zbcq51z _6zbcq51y _1fragem28 _1fragemnz _6zbcq51u _6zbcq51r _1fragem6t _6zbcq51o _6zbcq51x">
                                                                                <div class="_6zbcq520 _1fragemsk"><span class="_19gi7yt0 _19gi7yt19 _19gi7yt1t">{{ $item->quantity }}</span></div>
                                                                            </div>
                                                                            <div role="cell" class="_6zbcq51z _6zbcq51y _1fragem28 _1fragemnz _6zbcq51u _6zbcq51r _1fragem6t _6zbcq51p _6zbcq51n _1fragemmt">
                                                                                <div class="_197l2oft _1fragemnz _1fragemmp _1fragem28 _1fragemlt Byb5s"><span class="_19gi7yt0 _19gi7yt19 _19gi7yt1t notranslate">{{number_format($item->price * $item->quantity)}}</span></div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach




                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div aria-hidden="true" class="_1r4exbt1 _1r4exbt0 _1fragemev _1fragemd2 _1fragemir _1fragemgy _1fragemlj _1fragem28 _1fragemmn _1fragemql _1fragemsj _1r4exbtc _1r4exbta _1fragems2 _1r4exbt8 _1r4exbt6 _1fragemrl">
                                                            Scroll for more items
                                                            <span class="a8x1wu2 a8x1wu1 _1fragemor _1fragem1t _1fragemkp _1fragemkf a8x1wug a8x1wuj a8x1wuh _1fragem1y a8x1wun a8x1wul a8x1wut">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14" focusable="false" aria-hidden="true" class="a8x1wuv a8x1wuu _1fragem1y _1fragemor _1fragemkp _1fragemkf _1fragemny">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M7 1.5v11m0 0 4.75-3.826M7 12.5 2.25 8.674"></path>
                                    </svg>
                                  </span>
                                                        </div>
                                                    </div>
                                                </section>
                                            </div>
                                            <div id="gift-card-field" style="height:auto;overflow:visible;" class="_94sxtb1 _94sxtb0 _1fragemk0 _1fragemka _1fragemlt _1fragemt5 _94sxtbb _94sxtb4 _1fragemss">
                                                <div>
                                                </div>
                                            </div>
                                            <section class="_1fragem1y _1fragemlt">
                                                <div class="nfgb6p2 _1fragemsk">
                                                    <h3 id="MoneyLine-Heading160" class="n8k95w1 n8k95w0 _1fragemlt n8k95w4">Cost summary</h3>
                                                </div>
                                                <div role="table" aria-labelledby="MoneyLine-Heading160">
                                                    <div role="rowgroup" class="nfgb6p1 nfgb6p0 _1fragem2s nfgb6p3">
                                                        <div role="row" class="_1qy6ue60 _1qy6ue69 _1qy6ue61 _1qy6ue67 _1qy6ue65 _1fragem3h _1fragem5a _1fragem2s">
                                                            <div role="rowheader" class="_1qy6ue6b"><span class="_19gi7yt0 _19gi7yt19 _19gi7yt1t">Tạm tính</span></div>
                                                            <div role="cell" class="_1qy6ue6c"><span class="_19gi7yt0 _19gi7yt19 _19gi7yt1t notranslate">{{number_format($total)}} đ</span></div>
                                                        </div>

                                                        <div role="row" class="_1x41w3p1 _1x41w3p0 _1fragem2s _1fragemmn _1x41w3p2">
                                                            <div role="rowheader" class="_1x41w3p6"><strong class="_19gi7yt0 _19gi7ytk _19gi7ytj _1fragemoa _19gi7yt19 _19gi7yt1x">Tổng tiền</strong></div>
                                                            <div role="cell" class="_1x41w3p7">
                                                                <div class="_5uqybw0 _1fragemlt _1fragem28 _1fragem78">
                                                                    <div class="_5uqybw1 _1fragem28 _1fragemku _1fragemo5 _1fragem3h _1fragem5a _1fragemmm _1fragem78"><abbr class="_1qifbzv1 _1qifbzv0 _1fragemso"><span class="_19gi7yt0 _19gi7yte _19gi7ytd _1fragemo7 _19gi7yt1a _19gi7yt1t notranslate"></span></abbr><strong class="_19gi7yt0 _19gi7ytk _19gi7ytj _1fragemoa _19gi7yt19 _19gi7yt1x notranslate">{{number_format($total)}} đ</strong></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </section>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
            <div id="PortalHost"></div>
        </div>
    </div>
    <div id="forwarding-external-new-window-message" aria-hidden="true" class="rij0560 _1fragemsk">Opens external website in a new window.</div>
    <div id="forwarding-new-window-message" aria-hidden="true" class="rij0560 _1fragemsk">Opens in a new window.</div>
    <div id="forwarding-external-message" aria-hidden="true" class="rij0560 _1fragemsk">Opens external website.</div>
    <div role="status" class="_14u2r6s0 _1fragemsk"></div>
    <div role="alert" class="_14u2r6s0 _1fragemsk"></div>
    <meta name="serialized-initial-url" content="&quot;https://mymonsteraudio.com/checkouts/cn/Z2NwLWFzaWEtc291dGhlYXN0MTowMUpRS0owNkQ4QzZOWkFWUjNKSDRXSkM2UA?company_location_id=&amp;locale=en-VN&quot;"/>


{{--    // paypal--}}
    <script>
        window.PAYPAL_CLIENT_ID = "{{ config('paypal')[config('paypal.mode')]['client_id'] }}";
    </script>
    <script src="https://www.paypal.com/sdk/js?client-id={{ config('paypal')[config('paypal.mode')]['client_id'] }}&currency=USD"></script>

    <input type="hidden" id="total-amount" ng-model="total" />

</div>
<script>
    (function () {
        var hasPersistedData = localStorage.getItem('__ui') != null;
        if (hasPersistedData) return;

        var skeleton = document.querySelector('.LoadingShell');

        if (skeleton) {
            skeleton.addEventListener(
                'transitionend',
                function afterSkeletonFade() {
                    skeleton.remove();
                },
                {once: true}
            );
        }

        document.body.classList.remove('Loading');
        if (performance.mark) {
            try {
                performance.mark('checkout:visible', {
                    detail: {
                        devtools: {
                            dataType: 'marker',
                            color: 'primary-dark',
                            tooltipText:
                                'The critical elements of checkout are visible to the buyer'
                        }
                    }
                });
            } catch (err) {
            }
        }
    })();
</script><script>
    (function () {
        var location = new URL(window.location);

        ["amazonCheckoutSessionId","promiseId","amazon_cancelled"].forEach(
            function (paramName) {
                location.searchParams.delete(paramName);
            }
        );

        window.history.replaceState(null, document.title, location);
    })();
</script>
@include('site.partials.angular_mix')
<script>

</script>
<script>
    Object.defineProperty(window, Symbol.for('Shopify.checkout.htmlAvailable'), {
        value: true,
        writable: true,
        configurable: true,
        enumerable: false,
    });
    document.dispatchEvent(new Event('checkout:htmlavailable'));
    app.factory('cartItemSync', function ($interval) {
        var cart = {items: null, total: null};

        cart.items = @json($cartItems);
        cart.count = {{$cartItems->sum('quantity')}};
        cart.total = {{$totalPriceCart}};

        return cart;
    });
    angular.module('App')
        .factory('paypalService', ['$http', function($http) {
            return {
                createOrder: payload  =>
                    $http.post('/api/paypal/create-order', payload),
                captureOrder: orderID =>
                    $http.post('/api/paypal/capture-order', { orderID })
            };
        }]);
    app.controller('checkout', [
        '$rootScope', '$scope', '$interval', 'cartItemSync', 'paypalService',
        function ($rootScope, $scope, $interval, cartItemSync, paypalService) {
            $scope.items = @json($cartCollection);

            // click button đặt hàng
            $scope.form = {};
            $scope.loading = {};
            $scope.loading.submit = false;
            $scope.submitOrder = function () {
                $scope.loading.submit = true;
                jQuery.ajax({
                    type: "POST",
                    url: "{{route('cart.submit.order')}}",
                    headers: {
                        'X-CSRF-TOKEN': "{{csrf_token()}}"
                    },
                    data: {
                        customer_name: $scope.form.customer_name,
                        customer_phone: $scope.form.customer_phone,
                        customer_email: $scope.form.customer_email,
                        customer_address: $scope.form.customer_address,
                        customer_required: $scope.form.customer_required,
                        items: $scope.items
                    },
                    beforeSend: function () {
                        jQuery('.loading-spin').show();
                        // showOverlay();
                    },
                    success: function (response) {
                        if (response.success) {
                            $scope.errors = null;
                            window.location.href = "/dat-hang-thanh-cong.html/";
                        } else {
                            $scope.errors = response.errors;
                        }
                    },
                    error: function () {
                    },
                    complete: function () {
                        jQuery('.loading-spin').hide();
                        // hideOverlay();
                        $scope.loading.submit = false;
                        $scope.$applyAsync();
                    },
                });
            }









            // 1. Khởi tạo dữ liệu giỏ hàng và tổng tiền
            $scope.cartItems = [];
            $scope.amount = 0.00;

            // 2. Hàm đồng bộ cart và tính tổng
            function syncCart() {
                $scope.cartItems = cartItemSync.items;
                $scope.amount = cartItemSync.total; // Giả sử cartItemSync có method này
            }
            // Đồng bộ ngay khi load
            syncCart();
            // Đồng bộ định kỳ mỗi 5s (nếu có thay đổi từ các controller khác)
            $interval(syncCart, 5000);

            angular.element(document).ready(function() {
                paypal.Buttons({
                    createOrder: function(data, actions) {
                        const itemsArray = Object.values($scope.cartItems).map(item => ({
                            name: item.name,
                            sku: item.attributes.variant_id,
                            description: `color: ${item.attributes.color}, size: ${item.attributes.size}`,
                            unit_amount: {
                                currency_code: 'VND',
                                value: item.price.toString()
                            },
                            quantity: item.quantity.toString()
                        }));

                        const payload = {
                            amount: $scope.amount.toString(),
                            currency: 'VND',
                            description: 'Thanh toán giỏ hàng',
                            items: itemsArray
                        };
                        console.log('Payload tạo order:', payload);

                        // 2) gọi server
                        return paypalService.createOrder(payload)
                            .then(res => {
                                console.log('Server trả về orderID:', res.data.orderID);
                                return res.data.orderID;
                            });
                    },


                    // V2: capture ngay trên server
                    onApprove: function(data) {
                        return paypalService.captureOrder(data.orderID)
                            .then(res => {
                                console.log('Thanh toán thành công:', res.data);
                                alert('Thanh toán thành công!');

                                window.location.href = "/dat-hang-thanh-cong.html/";
                            });
                    },
                    onError: function(err) {
                        console.error('Lỗi PayPal:', err);
                        alert('Thanh toán thất bại.');
                    }
                }).render('#paypal-button-container');
            });

        }
    ]);




</script>
</body>
</html>
