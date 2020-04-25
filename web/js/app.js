const Messages = {
    list: [],
    fetch: (vnode, params = {}) => m.request({url: "fetch.php", params}).then((result) => Messages.list = result),
}

// Hack to inject HTML into the body of an iFrame
const IframeNode = {                  
    oncreate: vnode => m.render(vnode.dom.contentDocument.documentElement, vnode.children),
    view: vnode => m('iframe', vnode.attrs)
}

const EmailRow = {

    formatEmail: (email, abbr = false) => {
        if (typeof email === 'string') {
            return email;
        }

        const address = Object.keys(email)[0];
        const name = Object.values(email)[0];
        if (abbr) {
            return name ? m('abbr', {rel: 'tooltip', title: address}, name) : m('span', address);
        } else {
            return name ? m('span.email', [name, m('small', address)]) : m('span', address);
        }
    },

    renderTo: function (headers) {
        if (headers['X-Swift-To']) {
            let xSwiftTo = headers['X-Swift-To'];
            const address = Object.keys(xSwiftTo)[0];
            const name = Object.values(xSwiftTo)[0];
            return m('span.xswift', [name, m('small', address), this.formatEmail(headers['To'], true)]);
        }

        return this.formatEmail(headers['To']);
    },

    modal: function(message) {
        const headers = message.headers;
        const messageId = headers['Message-ID'][0].replace(/@.*$/,'');

        return m(".modal", {id: `modal-${messageId}`}, [
            m(".modal-dialog.modal-dialog-scrollable", [
                m(".modal-content", [
                    m(".modal-header", [
                        m("h5.modal-title", headers['Subject']),
                        m("button", {type: "button", class: "close", "data-dismiss": "modal"}, "×")
                    ]),
                    m(".modal-body", m(IframeNode, {id: `iframe-${messageId}`}, m.trust(message.body)))
                ])
            ])
        ]);
    },

    btnShowEmail: (message) => {
        const messageId = message.headers['Message-ID'][0].replace(/@.*$/,'');
        const props = {type: "button", "data-toggle": "modal", "data-target": `#modal-${messageId}`, class: "btn btn-sm btn-primary"};
        return m("button", props, "Show Email");
    },

    formatDate: (unixtime) => {
        const date = moment(unixtime * 1000);
        let dateStr = date.format('MMM M HH:MM A');
        if (date.format('l') === moment().format('l')) {
            dateStr = 'Today ' + date.format('HH:MM A');
        }
        return m("span.date", [dateStr, m('small.relative-date', date.fromNow())]);
    },

    view: function (vnode) {
        console.log('Rendering EmailRow', vnode.attrs);

        const data = vnode.attrs;
        const headers = data.message.headers;

        const date = moment(headers['Date'] * 1000);
        const replyTo = headers['Reply-To'] ? this.formatEmail(headers['Reply-To']) : m('span', 'N/A');

        return [m("tr", [
            m("td", data.idx),
            m("td", this.formatDate(headers['Date'])),
            m("td", this.formatEmail(headers['From'])),
            m("td", replyTo),
            m("td", this.renderTo(headers)),
            m("td", headers['Subject']),
            m("td", this.btnShowEmail(data.message))
        ]), this.modal(data.message)];
    }
}

const EmailList = {
    oninit: Messages.fetch,
    data: {idx: 0}, // Initial state

    view: function (vnode) {
        vnode.state.data.idx = 0; // Reset count to zero when the list is rendered
        $('.total-messages').html(Messages.list.length);
        console.log('EmailList vnode is', Messages.list.length, vnode.state.data, vnode);

        const thead = m("thead", [
            m("tr", [
                m("th", "#"), m("th.date", "Date"), m("th.email", "From"), m("th.email", "Reply To"), 
                m("th.email", "To"), m("th", "Subject"), m("th.actions", "Actions")
            ])
        ]);

        const tbody = m("tbody", Messages.list.map((message) => m(EmailRow, {message, idx: ++vnode.state.data.idx})));
        return [thead, tbody];
    }
}

m.mount(document.querySelector('table'), EmailList);
$('.action-fetch').on('click', Messages.fetch);
$('.action-clear').on('click', Messages.fetch.bind(this, null, {clear: 1}));