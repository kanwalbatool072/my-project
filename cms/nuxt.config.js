export default {
    // mode: "spa",
    ssr: false,
    /*
   ** Headers of the page
   */
    head: {
        title: process.env.npm_package_name || "",
        meta: [
            {
                charset: "utf-8"
            }, {
                name: "viewport",
                content: "width=device-width, initial-scale=1"
            }, {
                hid: "description",
                name: "description",
                content: process.env.npm_package_description || ""
            }
        ],
        link: [
            {
                rel: "icon",
                type: "image/x-icon",
                href: "/favicon.ico"
            }
        ]
    },
    components: true,
    // router: {
    //     base: '/signin_erp'
    // },


    /*
   ** Customize the progress-bar color
   */
    loading: {
        color: "#fff"
    },
    /*
   ** Global CSS
   */
    css: ["~/assets/scss/coreui.scss"],
    /*
   ** Plugins to load before mounting the App
   */
    plugins: [
        {
            src: "~/plugins/Datepicker",
            mode: "client"
        }, {
            src: "~/plugins/Validations",
            mode: "client"

        }, {
            src: "~/plugins/toast-notification",
            mode: "client"

        },
        {
            src: "~/plugins/Endpoints",
            mode: "client"
        },
        {
            src: "~/plugins/axios",
            mode: "client"
        }
    ],
    /*
   ** Nuxt.js dev-modules
   */
    buildModules: [],
    /*
   ** Nuxt.js modules
   */
    modules: [
        [
            "bootstrap-vue/nuxt", {
                css: false
            },
        ],
        '@nuxtjs/auth-next',
        '@nuxtjs/axios',
        '@nuxtjs/proxy',
    ],
    axios: {
        progress: false,
        // proxy:true,
        // common: {
        //     'Accept': 'application/json'
        // },
        // baseURL: 'http://signintribe.com/demo/signinErpBackend/api/v1'
        baseURL: 'http://127.0.0.1:8000/api/v1'
    },

    auth: {
        redirect: {
            login: '/auth/login',
            logout: '/auth/login',
            callback: '/admin',
            home: '/admin'
        },
        strategies: {
            local: {
                token: {
                    property: 'data.token',
                    required: true,
                    type: 'Bearer'
                },
                user: {
                    property: 'data.user',
                    autoFetch: true
                },
                refreshToken: {
                    property: 'data.refresh_token',
                    data: 'data.refresh_token',
                    maxAge: 'data.expires_in'
                },
                endpoints: {
                    login: {
                        url: 'auth/login',
                        method: 'post'
                    },
                    refresh: {
                        url: '/auth/refresh',
                        method: 'post'
                    },
                    logout: {
                        url: 'auth/logout',
                        method: 'post'
                    },
                    user: {
                        url: 'me',
                        method: 'get'
                    }
                }
            }
        }
    },
    /*
   ** Build configuration
   */
    build: { /*
     ** You can extend webpack config here
     */
        extend(config, ctx) { }
    }
};
