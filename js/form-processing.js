$(document).ready(function() {
    $('.ui.form').form({
        fields: {
            title: {
                identifier: 'title',
                rules: [{
                    type: 'empty',
                    prompt: 'You must specify a title'
                }]
            },
            fname: {
                identifier: 'fname',
                rules: [{
                    type: 'empty',
                    prompt: 'You must have first name'
                }]
            },
            mname: {
                identifier: 'mname',
                rules: [{
                    type: 'empty',
                    prompt: 'You must have second name'
                }]
            },
            lname: {
                identifier: 'lname',
                rules: [{
                    type: 'empty',
                    prompt: 'You must have a last/Surname'
                }]
            },
            sex: {
                identifier: 'sex',
                rules: [{
                    type: 'empty',
                    prompt: 'You must specify your gender'
                }]
            },
            dob: {
                identifier: 'dob',
                rules: [{
                    type: 'empty',
                    prompt: 'You must have provide your birthdate'
                }]
            },
            type: {
                identifier: 'type',
                rules: [{
                    type: 'empty',
                    prompt: 'You must specify residence type'
                }]
            },
            region: {
                identifier: 'region',
                rules: [{
                    type: 'empty',
                    prompt: 'You must provide your region'
                }]
            },
            district: {
                identifier: 'district',
                rules: [{
                    type: 'empty',
                    prompt: 'You must provide your district'
                }]
            },
            ward: {
                identifier: 'ward',
                rules: [{
                    type: 'empty',
                    prompt: 'You must provide your ward'
                }]
            },
            mobile: {
                identifier: 'mobile',
                rules: [{
                    type: 'empty',
                    prompt: 'You must have a phone number'
                }]
            },
            email: {
                identifier: 'email',
                rules: [{
                    type: 'email',
                    prompt: 'Please enter a valid e-mail'
                }]
            },
            houseno: {
                identifier: 'houseno',
                rules: [{
                    type: 'empty',
                    prompt: 'Please enter a house number'
                }]
            },
            street: {
                identifier: 'street',
                rules: [{
                    type: 'empty',
                    prompt: 'Please enter your street name'
                }]
            },
            occupation: {
                identifier: 'occupation',
                rules: [{
                    type: 'empty',
                    prompt: 'Please enter your current occupation'
                }]
            },
            recipient: {
                identifier: 'recipient',
                rules: [{
                    type: 'empty',
                    prompt: 'Choose a recipient'
                }]
            },
            subject: {
                identifier: 'subject',
                rules: [{
                    type: 'empty',
                    prompt: 'Please enter messame subject'
                }]
            },
            message: {
                identifier: 'message',
                rules: [{
                    type: 'empty',
                    prompt: 'Please enter message content'
                }]
            },
            code: {
                identifier: 'code',
                rules: [{
                    type: 'empty',
                    prompt: 'Enter the code sent to your Mobile Phone (333-33-33)'
                }]
            },
            username: {
                identifier: 'username',
                rules: [{
                    type: 'empty',
                    prompt: 'Please, you must provide your Username'
                }]
            },
            password: {
                identifier: 'password',
                rules: [{
                    type: 'empty',
                    prompt: 'Please, you must provide your Username'
                },{
                    type: 'email',
                    prompt: 'Please enter a valid email address'
                }]
            }
        }
    });
})