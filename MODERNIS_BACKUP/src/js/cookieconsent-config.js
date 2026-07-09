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
        default: "lt",
        autoDetect: "browser",
        translations: {
                        lt: {                consentModal: {                    title: "Labas, slapukų laikas!",                    description: "Pasirinkite, kokius slapukus mums leidžiate naudoti modernist.kaunas.lt",                    acceptAllBtn: "Priimti visus",                    acceptNecessaryBtn: "Atmesti visus",                    showPreferencesBtn: "Tvarkyti pasirinkimus",                    footer: "<a target='_blank' href=\"https://www.kaunas.lt/slapuku-politika/\">Slapukų politika</a>"                },                preferencesModal: {                    title: "Slapukų nustatymai",                    acceptAllBtn: "Priimti visus",                    acceptNecessaryBtn: "Atmesti visus",                    savePreferencesBtn: "Išsaugoti pasirinkimus",                    closeIconLabel: "Close modal",                    serviceCounterLabel: "Service|Services",                    sections: [                        {                            title: "Slapukų naudojimas",                            description: "Mes naudojame slapukus siekdami pagerinti vartotojo patirtį."                        },                        {                            title: "Būtini slapukai <span class=\"pm__badge\">Įjungta</span>",                            description: "Šie slapukai būtini svetainės naršymui, veikimui, saugumui ir funkcionalumui užtikrinti. Šie slapukai būtini norint suteikti jums informaciją ir paslaugas.",                            linkedCategory: "necessary"                        },                        {                            title: "Funkciniai slapukai",                            description: "Padeda įsiminti jūsų pasirinkimus, kuriais nustatote tam tikrą svetainės rodymą ir veikimą. Naudojantis tuo, mes galime pritaikyti puslapyje esančios informacijos pateikimą pagal jūsų poreikius.",                            linkedCategory: "functionality"                        },                        {                            title: "Daugiau informacijos",                            description: "Jei turite klausimų, susijusių su slapukų politika ir jūsų pasirinkimais, prašome susisiekti <a class=\"cc__link\" href=\"#yourdomain.com\"></a>."                        }                    ]                }            }
        }
    }
});