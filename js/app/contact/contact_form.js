function ContactForm() 
{
	var postUrl;
	var fileUpload;
	this.Init = function() {
		postUrl = 'php/actions.php';
		initValidator();
		initControls();
	}
	
	function initControls()
	{
		
	}
	
	function submitForm()
	{
		var params = getFormParams();
		frm.PostAjaxJson(postUrl, params, function(data) {
			if (data.status == 'success'){
				toastr.success(data.message);
				clearForm();
			}
			else {
				toastr.error(data.message);
			}
		});
		
		return false; // don't submit in classic way
	}
	
	function initValidator()
	{
		var rules = { userFullName: 'required',	userEmail: { required: true, email: true},	userSubject: 'required',	userMessage: 'required'	};
		var messages = { userFullName: 'Completati numele', userEmail: { required: 'Completati emailul', email: 'Emailul nu este valid'}, userSubject: 'Completati telefonul', userMessage: 'Completati mesajul' };
				
		var vW = new ValidatorWrapper();
		vW.setOptions({scrollMarginTop: -120});
		vW.InitValidator('frmContact', rules, messages, submitForm);
	}
	
	function getFormParams()
	{
		var params = { ajaxAction: 'sendContactEmail', name: $('#userFullName').val(), email: $('#userEmail').val(), phone: $('#userPhone').val(), message: $('#userMessage').val(),  };
		return params;
	}
	
	function clearForm()
	{
		$('#userFullName').val('');
		$('#userEmail').val('');
		$('#userPhone').val('');
		$('#userMessage').val('');
	}
}

var frm = null;
if (typeof FormClass === 'function') {
	frm = new FormClass();
}

var ctlContactForm = new ContactForm();
ctlContactForm.Init();