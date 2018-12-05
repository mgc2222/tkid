window.addEventListener("load", function() {
    window.cookieconsent.initialise({
        palette: {
            popup: {
                background: "#d0f4f0",
            },
            button: {
                background: "#62ffaa"
            },

        },
        //theme: "edgeless",
        content: {
            header: cookiesHeader,
            message: cookiesMessage,
            dismiss: cookiesDismissButtonMessage,
            allow: cookiesAllowButtonMessage,
            deny: cookiesDeclineButtonMessage,
            link: cookiesLinkMessage,
            href: cookiesLinkHref,
            close: '&#x274c;',
            policy: cookiesPolicyButtonMessage,
            target: '_blank',
        }
    })
});