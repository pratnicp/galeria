/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function validate_form ( )
{
    valid = true;

    if ( document.contact_form.email.value == "" )
    {
        document.contact_form.email.style.background="#880000";
        alert ( "Adres email jest wymagany");
        valid = false;
    }

    return valid;
}

