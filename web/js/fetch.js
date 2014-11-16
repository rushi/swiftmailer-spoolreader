(function ($, window) {
    
    function doFetch() {
        $('table.messages .loading').show();
        $.getJSON('fetch.php', function (messages) {
            console.debug(messages);
            if(messages.length > 0) {
                $('table.messages .loading').hide();
                $.each(messages, parseMessage);
                $('[rel=tooltip]').tooltip();
                $('.total-messages').html(messages.length);
            } else {
                $('table.messages .loading > td').html('No messages found!');
            }
        });
    }
    
    function parseMessage(idx, message) {
        var headers = message['headers'],
            messageId = headers['Message-ID'][0].replace(/@.*$/,'');

        // Create the td's required
        var num = createTd('idx', idx+1),
            date = createTd('date', parseDate(headers['Date'])),
            subject = createTd('subject', headers['Subject']),
            actions = createTd('actions', '<button type="button" data-toggle="modal" data-target="#modal-'+messageId+'" class="btn btn-sm btn-primary">Show Email</button>');

        var replyTo = '',
            fromOpts = 'colspan="2"';
        if(parseEmail(headers['Reply-To']) != parseEmail(headers['From'])) {
            replyTo = createTd('reply-to', parseEmail(headers['Reply-To']));
            fromOpts = '';
        }
        var from = createTd('from', parseEmail(headers['From']), fromOpts);

        // To address is special - it will show 'To' and X-Swift-To + X-Swift-BCC
        var toStr = parseEmail(headers['To']) + addHeader('X-Swift-To', parseEmail(headers['X-Swift-To'])) + addHeader('X-Swift-Bcc', parseEmail(headers['X-Swift-Bcc']));
        var to = createTd('to', toStr);

        var tr = '<tr data-message-id="' + messageId + '" class="message-row-' + idx + '">' + num + date + from + replyTo + to + subject + actions + '</tr>';
        $('table.messages tbody').append(tr);

        createModal('modal-' + messageId, headers['Subject'], message['body']);
    }

    function createTd(field, value, opts) {
        opts = (!opts) ? '' : opts;
        var str = '<td class="message message-' + field + '"' + opts + '>' + value + "</td>";
        return str;
    }

    function createModal(id, title, body) {
        var modal = '<div id="' + id + '" class="modal fade"><div class="modal-dialog"><div class="modal-content"><div class="modal-header">';
        modal += '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
        modal += '<h4 class="modal-title">' + title + '</h4>';
        modal += '</div>';
        modal += '<div class="modal-body"><iframe id="iframe-'+id+'"></iframe></div>';
        modal += '</div></div></div>';

        $('#modalHolder').append(modal);

        $('#iframe-' + id).contents().find('body').html(body);
    }

    function addHeader(field, value) {
        if(field != '') {
            return '<div class="message-additional-header">' +
                '<span class="field-name">' + field + '</span><span class="field-value">' + value + '</span></div>';
        }

        return '';
    }

    function parseDate(date) {
        return moment(date * 1000).format('lll');
    }

    function parseEmail(email) {
        if (typeof email == "string") {
            return email;
        }

        var emailStr;
        for (key in email) {
            var name = email[key];
            if (name) {
                emailStr = '<abbr rel="tooltip" title="' + key + '">' + name + '</abbr>';
            } else {
                emailStr = key;
            }
        }

        return emailStr;
    }

    $('.action-fetch').click(doFetch);    
    
    $(document).ready(doFetch);
}(jQuery, this));