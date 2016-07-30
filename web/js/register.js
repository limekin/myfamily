/**
 * Javascript parts that are invovled in the user registration process.
 */

var register = (function() {

    // Gets the form.
    var getForm = function(formId) {
        return $('#'+formId).serializeArray();
    };

    // Checks if the family name is already taken. 
    var checkFamilyName = function(formId) {
        var form = getForm(formId);
        var familyName;
        for(var i=0; i<form.length; ++i) {
            if(form[i].name == "form[family_name]") {
                familyName = form[i].value;
                break;
            }
        }

        // Now send the family name to the server for the check.        
        $.get('/ajax/has_family/' + familyName.trim(), function(data) {
            if(data == "yes") {
                $("#familyCheck").html("The family name is already registered. Would you like to login instead ?");
            } 
        });
    };

    // Checks for the existence of email ID.
    var checkMail = function(formId) {

    };

    return {
        checkFamilyName: checkFamilyName,
        checkMail: checkMail
    };

})();
