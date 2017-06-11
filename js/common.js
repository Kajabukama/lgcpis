
$(document).ready(function() {

    $('.ui.checkbox').checkbox();
    $('.menu .item').tab({alwaysRefresh: true});
    $('.ui.dropdown').dropdown();
    $('.ui.accordion').accordion();
    $('.ui.modal.sms').modal('attach events', '.button.sms', 'show');
    $('.ui.modal.topic').modal('attach events', '.button.topic', 'show');
    $('.ui.modal.announce').modal('attach events', '.button.announce', 'show');
  
    $('#dob').calendar({
        monthFirst: true,
        type:'date',
        formatter: {
            date: function (date, settings) {
              if (!date) return '';
              var day = date.getDate();
              var month = date.getMonth() + 1;
              var year = date.getFullYear();
              return year + '-' + day + '-' + month;
            }
        }
    }); 

})