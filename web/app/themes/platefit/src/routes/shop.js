const options = {
  product: {
    styles: {
      product: {
        "@media (min-width: 601px)": {
          "max-width": "calc(25% - 20px)",
          "margin-left": "20px",
          "margin-bottom": "50px",
          width: "calc(25% - 20px)"
        },
        img: {
          height: "calc(100% - 15px)",
          position: "absolute",
          left: "0",
          right: "0",
          top: "0"
        },
        imgWrapper: {
          "padding-top": "calc(75% + 15px)",
          position: "relative",
          height: "0"
        }
      },
      button: {
        color: "#333333",
        "font-family": "MaisonNeue-Bold, sans-serif",
        ":hover": {
          "background-color": "#fed710"
        },
        ":focus": {
          "background-color": "#fed710"
        },
        ":active": {
          "color": "#fff"
        },
        "background-color": "transparent",
        "border": "2px solid #fed710",
        "border-radius": "0px",
        "padding-left": "54px",
        "padding-right": "54px"
      }
    },
    buttonDestination: "modal",
    contents: {
      options: false
    },
    text: {
      button: "View product"
    }
  },
  productSet: {
    styles: {
      products: {
        "@media (min-width: 601px)": {
          "margin-left": "-20px"
        }
      }
    }
  },
  modalProduct: {
    contents: {
      img: false,
      imgWithCarousel: true,
      button: false,
      buttonWithQuantity: true
    },
    styles: {
      product: {
        "@media (min-width: 601px)": {
          "max-width": "100%",
          "margin-left": "0px",
          "margin-bottom": "0px"
        }
      },
      button: {
        color: "#333333",
        ":hover": {
          color: "#333333",
          "background-color": "#e5c20e"
        },
        "background-color": "#fed710",
        ":focus": {
          "background-color": "#e5c20e"
        },
        "border-radius": "0px",
        "padding-left": "54px",
        "padding-right": "54px"
      }
    },
    text: {
      button: "Add to cart"
    }
  },
  cart: {
    styles: {
      button: {
        color: "#333333",
        ":hover": {
          color: "#333333",
          "background-color": "#e5c20e"
        },
        "background-color": "#fed710",
        ":focus": {
          "background-color": "#e5c20e"
        },
        "border-radius": "0px"
      },
      title: {
        color: "#333333"
      },
      header: {
        color: "#333333"
      },
      lineItems: {
        color: "#333333"
      },
      subtotalText: {
        color: "#333333"
      },
      subtotal: {
        color: "#333333"
      },
      notice: {
        color: "#333333"
      },
      currency: {
        color: "#333333"
      },
      close: {
        color: "#333333",
        ":hover": {
          color: "#333333"
        }
      },
      empty: {
        color: "#333333"
      },
      noteDescription: {
        color: "#333333"
      },
      discountText: {
        color: "#333333"
      },
      discountIcon: {
        fill: "#333333"
      },
      discountAmount: {
        color: "#333333"
      }
    },
    text: {
      total: "Subtotal",
      button: "Checkout"
    },
    contents: {
      note: true
    },
    popup: false
  },
  toggle: {
    styles: {
      toggle: {
        "background-color": "#fed710",
        ":hover": {
          "background-color": "#e5c20e"
        },
        ":focus": {
          "background-color": "#e5c20e"
        }
      },
      count: {
        color: "#333333",
        ":hover": {
          color: "#333333"
        }
      },
      iconPath: {
        fill: "#333333"
      }
    }
  },
  lineItem: {
    styles: {
      variantTitle: {
        color: "#333333"
      },
      title: {
        color: "#333333"
      },
      price: {
        color: "#333333"
      },
      fullPrice: {
        color: "#333333"
      },
      discount: {
        color: "#333333"
      },
      discountIcon: {
        fill: "#333333"
      },
      quantity: {
        color: "#333333"
      },
      quantityIncrement: {
        color: "#333333",
        "border-color": "#333333"
      },
      quantityDecrement: {
        color: "#333333",
        "border-color": "#333333"
      },
      quantityInput: {
        color: "#333333",
        "border-color": "#333333"
      }
    }
  }
};

export default {
  init() {
    var scriptURL =
      "https://sdks.shopifycdn.com/buy-button/latest/buy-button-storefront.min.js";
    if (window.ShopifyBuy) {
      if (window.ShopifyBuy.UI) {
        ShopifyBuyInit();
      } else {
        loadScript();
      }
    } else {
      loadScript();
    }
    function loadScript() {
      var script = document.createElement("script");
      script.async = true;
      script.src = scriptURL;
      (
        document.getElementsByTagName("head")[0] ||
        document.getElementsByTagName("body")[0]
      ).appendChild(script);
      script.onload = ShopifyBuyInit;
    }
    function ShopifyBuyInit() {
      var client = ShopifyBuy.buildClient({
        domain: "platefit.myshopify.com",
        storefrontAccessToken: "9653c93b95abcac2169c3cfd9986c6d3"
      });
      ShopifyBuy.UI.onReady(client).then(function(ui) {
        const nodes = document.querySelectorAll('[data-component="shopify-collection"]');

        for (const node of nodes) {
          const { collection } = node.dataset

          node.removeChild(node.querySelector('[data-component="loader"]'))

          ui.createComponent("collection", {
            node,
            options,
            id: collection,
            moneyFormat: "%24%7B%7Bamount%7D%7D",
          });
        }
      });
    }
    ShopifyBuyInit();
  },
  finalize() {}
};
