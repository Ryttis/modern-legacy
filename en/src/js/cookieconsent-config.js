import 'https://cdn.jsdelivr.net/gh/orestbida/cookieconsent@3.0.1/dist/cookieconsent.umd.js';

CookieConsent.run({
    guiOptions: {
        consentModal: {
            layout: "box inline",
            position: "bottom left",
            equalWeightButtons: true,
            flipButtons: false
        },
        preferencesModal: {
            layout: "box",
            position: "right",
            equalWeightButtons: true,
            flipButtons: false
        }
    },
    categories: {
        necessary: {
            readOnly: true
        },
        functionality: {}
    },
    language: {
        default: "en",
        autoDetect: "browser",
        translations: {
            en: {                consentModal: {                    title: "Hello, it's cookie time!",                    description: "Choose what cookies you allow us to use in modernist.kaunas.lt",                    acceptAllBtn: "Accept all",                    acceptNecessaryBtn: "Reject all",                    showPreferencesBtn: "Manage preferences",                    footer: "\n<a target='_blank' href=\"https://www.kaunas.lt/slapuku-politika/\">Terms and conditions</a>"                },                preferencesModal: {                    title: "Consent Preferences Center",                    acceptAllBtn: "Accept all",                    acceptNecessaryBtn: "Reject all",                    savePreferencesBtn: "Save preferences",                    closeIconLabel: "Close modal",                    serviceCounterLabel: "Service|Services",                    sections: [                        {                            title: "Cookie Usage",                            description: "We use cookies to improve user experience."                        },                        {                            title: "Strictly Necessary Cookies <span class=\"pm__badge\">Always Enabled</span>",                            description: "These cookies are necessary for website navigation, operation, security and functionality. These cookies are necessary to provide you with information and services.",                            linkedCategory: "necessary"                        },                        {                            title: "Functionality Cookies",                            description: "Helps remember your choices that determine how the website looks and behaves. Using this, we can tailor the presentation of the information on the page to your needs.",                            linkedCategory: "functionality"                        },                        {                            title: "More information",                            description: "For any query in relation to my policy on cookies and your choices, please <a class=\"cc__link\" href=\"#yourdomain.com\">contact me</a>."                        }                    ]                }            }
        }
    }
});