
// JEQUERY FROM STYLER
$(function() {
    $('.cv-select').styler();
    $('.cv-radio').styler();
  });
   
  function showSpinner() {
    //disable double form submit
    $('#submit-btn').attr('disabled', true);
    //set file size and show spinner
    var file1 = document.getElementById('photo').files[0];
    document.getElementById('photo-size').innerHTML = (file1.size / 1024 / 1024).toFixed(2) + ' мг. ';
    document.getElementById('spinner-container').classList.add('show');
  }
  
  // Validate inputs with phone type (only numbers)
  function validate(evt) {
    var theEvent = evt || window.event;
  
    // Handle paste
    if (theEvent.type === 'paste') {
        key = event.clipboardData.getData('text/plain');
    } else {
    // Handle key press
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode(key);
    }
    var regex = /[0-9]|\./;
    if( !regex.test(key) ) {
      theEvent.returnValue = false;
      if(theEvent.preventDefault) theEvent.preventDefault();
    }
  }
  
  
  //Scroll into top of the form, after form navigations buttons press
var cv_form = document.getElementById('cv-form');
  function scroll_to_form() {
    setTimeout(function(){
      cv_form.scrollIntoView({block: 'start', behavior: 'smooth'});
    }, 200); 
  }
  
  //Scroll Top
  function scroll_to_top() {
    let body = document.body;
    body.scrollIntoView({ block: 'start', behavior: 'smooth' });
  }
  
  
  //Show additional Edication block
  var addit_educ_container = document.getElementById('additional_education');
  var show_addit_educ_container = document.getElementById('show_additional_education');
  
  function show_additional_education() {
    addit_educ_container.style.display = 'flex';
    show_addit_educ_container.style.display= 'none';
  }
  function hide_additional_education() {
    addit_educ_container.style.display = 'none';;
    show_addit_educ_container.style.display= 'block';
  }
  
  //Show additional Experience block
  var additional_experience = document.getElementById('additional_experience');
  var show_addit_exp_container = document.getElementById('show_additional_experience');
  function show_additional_experience() {
    additional_experience.style.display = 'flex';
    show_addit_exp_container.style.display= 'none';
  }
  function hide_additional_experience() {
    additional_experience.style.display = 'none';;
    show_addit_exp_container.style.display= 'block';
  }
  
  //Hide Session Flashed Message
  function hide_flashed_message() {
    document.getElementById('session').style.display = 'none';
  }
  
  // On radiobuttons change
  // Personal Tabs radios
  //on mobiles display is none. On PC visibility is hidden
  var childs_count_div = document.getElementById('childs_count_div');
  $('#no_childs').on('change', function() {
    if ($(this).is(':checked')) {
      childs_count_div.style.visibility = 'hidden';
      //  if its mobile
      if ($(window).width() <= 991) childs_count_div.style.display = 'none';
    }
  
  });
  $('#has_childs').on('change', function() {
    if ($(this).is(':checked')) {
      childs_count_div.style.visibility = 'visible';
      //  if its mobile
      if ($(window).width() <= 991) childs_count_div.style.display = 'block';
    }
  });
  
  // Address Tabs radios
  $('#registrated_address_false').on('change', function() {
    if ($(this).is(':checked')) 
      document.getElementById('additional_address').style.display = 'block';
  });
  $('#registrated_address_true').on('change', function() {
    if ($(this).is(':checked')) 
      document.getElementById('additional_address').style.display = 'none';
  });
  
  // Experience Tabs radios
  $('#experienced_true').on('change', function() {
    if ($(this).is(':checked')) 
      document.getElementById('experience-container').style.display = 'block';
  });
  $('#experienced_false').on('change', function() {
    if ($(this).is(':checked')) 
      document.getElementById('experience-container').style.display = 'none';
  });
  
  // Additional Tabs Radios
  $('#has_diseases').on('change', function() {
    if ($(this).is(':checked')) 
      document.getElementById('diseases_description').style.display = 'block';
  });
  $('#no_diseases').on('change', function() {
    if ($(this).is(':checked')) 
      document.getElementById('diseases_description').style.display = 'none';
  });
  
  $('#has_allergy').on('change', function() {
    if ($(this).is(':checked')) 
      document.getElementById('allergy_description').style.display = 'block';
  });
  $('#no_allergy').on('change', function() {
    if ($(this).is(':checked')) 
      document.getElementById('allergy_description').style.display = 'none';
  });
  
  $('#is_pregnant').on('change', function() {
    if ($(this).is(':checked')) 
      document.getElementById('pregnant_description').style.display = 'block';
  });
  $('#isnt_pregnant').on('change', function() {
    if ($(this).is(':checked')) 
      document.getElementById('pregnant_description').style.display = 'none';
  });
  
  $('#has_criminal').on('change', function() {
    if ($(this).is(':checked')) 
      document.getElementById('criminal_description').style.display = 'block';
  });
  $('#no_criminal').on('change', function() {
    if ($(this).is(':checked')) 
      document.getElementById('criminal_description').style.display = 'none';
  });
  
  $('#no_relative').on('change', function() {
    if ($(this).is(':checked'))
      document.getElementById('relatives-div').style.display = 'none';
  });
  $('#has_relative').on('change', function() {
    if ($(this).is(':checked'))
      document.getElementById('relatives-div').style.display = 'flex';
  });
  
  
  //On form previous tab click
  function form_previous_tab(id) {
    //Click on previous tab link
    document.getElementById(id).click();
    warning.style.display = 'none';
    scroll_to_form();
  }
  
  
  //Used to warn required field on forms tab next button click
  var warning = document.getElementById('form-error');
  // On form next tab click
  function form_next_tab(e) {
    e = event.target;
  
    switch (e.id) {   //Swtich Start
      // Case its Personal info tab
      case 'btn-personal-next':
        var required = [];
        var jq_selects = [];
        var jq_radio;
        var errors = false;
        // CHECKING IF ALL REQUIRED INPUTS ARE FILLED
        required.push(document.querySelector('input[name="surname"]'));
        required.push(document.querySelector('input[name="name"]'));
        required.push(document.getElementById('bday-day'));
        required.push(document.getElementById('bday-month'));
        required.push(document.getElementById('bday-year'));
        required.push(document.getElementById('married'));
        required.push(document.querySelector('input[name="phone1"]'));
        required.push(document.getElementById('photo'));
        // CHEKING RADIOBUTTONS
        var childs = document.querySelector('input[name="childs"]:checked');
        if (childs == null) errors = true;
        // ACCEPTING ERROR IF FIELDS ARE NOT FILLED
        for (var i = 0; i < required.length; i++)
          if (required[i].value == '') errors = true;
        //Checking photo
        var file1 = document.getElementById('photo').files[0];
        if (!file1) errors = true;
        
        if (errors) {
          // ADDING JQUERY SELECTS INTO MASSIVE
          jq_selects.push(document.getElementById('bday-day-styler'));
          jq_selects.push(document.getElementById('bday-month-styler'));
          jq_selects.push(document.getElementById('bday-year-styler'));
          jq_selects.push(document.getElementById('married-styler'));
          jq_selects.push(document.getElementById('childs-count-styler'));
          for (var z = 0; z < jq_selects.length; z++) {
            var jq_sel = jq_selects[z].getElementsByClassName('jq-selectbox__select');
            required.push(jq_sel[0]);
          }
          // ADDING JQUERY RADIO INTO MASSIVE
          jq_radio = document.getElementById('pills-personal').getElementsByClassName('jq-radio cv-radio');
          for (var x = 0; x < jq_radio.length; x++)
            required.push(jq_radio[x]);
          // CHANGING REQUIRED INPUTS BORDER COLOR INTO RED
          for (var i = 0; i < required.length; i++) {
            required[i].style.borderColor = 'red';
          }
          warning.style.display = 'block';
        }
        else {
          document.getElementById("pills-position-tab").click();
          warning.style.display = 'none';
          scroll_to_form();
        }
  
      break;
      
  
      // Casr Positions Tab
      case 'btn-position-next':
      if(document.getElementById('position').value == '') {
        var select = document.getElementById('position-styler');
        var box = select.getElementsByClassName('jq-selectbox__select');
        box[0].style.borderColor = 'red';
        warning.style.display = 'block';
      }
  
      else {
        document.getElementById("pills-address-tab").click(); 
        warning.style.display = 'none';
        scroll_to_form();
      }
        
      break;
      
      // Casr Address Tab
      case 'btn-address-next' :
        var required = [];
        var jq_selects = [];
        var jq_radio = [];
        var errors = false;
        // CHECKING IF ALL REQUIRED INPUTS ARE FILLED
        required.push (document.querySelector('input[name="street1"]'));
        required.push (document.getElementById('city1'));
        // CHEKING RADIOBUTTONS
        var reg_address = document.querySelector('input[name="living_in_registrated_address"]:checked');
        //if User didnt answer the question
        if (reg_address == null) errors = true;
        // ADDING REQUIRED INPUTS INTO MASSIVE CASE USERS ACTUAL ADDRESS DIFFER FROM CURRENT ADDRESS
        if(reg_address && reg_address.value == '0') {
          required.push (document.querySelector('input[name="street2"]'));
          required.push (document.getElementById('city2'));
        }
  
        // ACCEPTING ERROR IF FIELDS ARE NOT FILLED
        for(var i=0; i<required.length; i++) 
        if(required[i].value == '') errors = true; 
  
        if(errors) {
          // ADDING SIMPLE INPUT INTO MASSIVE TO ALSO CHANGE BORDER COLOR
          required.push (document.querySelector('input[name="street2"]'));
          // ADDING JQUERY SELECTS INTO MASSIVE
          jq_selects.push(document.getElementById('city1-styler'));
          jq_selects.push(document.getElementById('city2-styler'));
          for(var z=0; z<jq_selects.length; z++) {
            var jq_sel = jq_selects[z].getElementsByClassName('jq-selectbox__select');
            required.push(jq_sel[0]);
          }
          // ADDING JQUERY RADIO INTO MASSIVE
          jq_radio = document.getElementById('pills-address').getElementsByClassName('jq-radio');
          for(var x=0; x<jq_radio.length; x++)
            required.push(jq_radio[x]);
  
          // CHANGING REQUIRED INPUTS BORDER COLOR INTO RED
          for(var i=0; i<required.length; i++) {
            required[i].style.borderColor = 'red';
          }
          warning.style.display = 'block';
        }
        else  {
          document.getElementById("pills-education-tab").click(); 
          warning.style.display = 'none';
          scroll_to_form();
        }
  
      break;
  
      // Casr Education Tab
      case 'btn-education-next':
        var required = [];
        var jq_selects = [];
        var jq_radio = [];
        var errors = false;
        // CHECKING IF ALL REQUIRED INPUTS ARE FILLED
        required.push (document.querySelector('input[name="education1-institution-name"]'));
        required.push (document.getElementById('education1-lvl'));
        required.push (document.getElementById('education1-beginning'));
        required.push (document.getElementById('education1-finished'));
        required.push (document.getElementById('tajik-lvl'));
        required.push (document.getElementById('russian-lvl'));
        required.push (document.getElementById('english-lvl'));
        // ADDING REQUIRED IPUTS INTO MASSIVE CASE ADDITIONAL EDUCATION IS ACTIVE
        var add_educ = document.getElementById('additional_education');
        if(add_educ.style.display == 'flex') {
          required.push (document.querySelector('input[name="education2-institution-name"]'));
          required.push (document.getElementById('education2-lvl'));
          required.push (document.getElementById('education2-beginning'));
          required.push (document.getElementById('education2-finished'));
        }
        // ACCEPTING ERROR IF FIELDS ARE NOT FILLED
        for(var i=0; i<required.length; i++) 
        if(required[i].value == '') errors = true; 
  
        if(errors) {
          // ADDING SIMPLE INPUT INTO MASSIVE TO ALSO CHANGE BORDER COLOR
          required.push (document.querySelector('input[name="education2-institution-name"]'));
          // ADDING JQUERY SELECTS INTO MASSIVE
          jq_selects.push(document.getElementById('education1-lvl-styler'));
          jq_selects.push(document.getElementById('education1-beginning-styler'));
          jq_selects.push(document.getElementById('education1-finished-styler'));
          jq_selects.push(document.getElementById('tajik-lvl-styler'));
          jq_selects.push(document.getElementById('russian-lvl-styler'));
          jq_selects.push(document.getElementById('english-lvl-styler'));
          jq_selects.push(document.getElementById('education2-lvl-styler'));
          jq_selects.push(document.getElementById('education2-beginning-styler'));
          jq_selects.push(document.getElementById('education2-finished-styler'));
          for(var z=0; z<jq_selects.length; z++) {
            var jq_sel = jq_selects[z].getElementsByClassName('jq-selectbox__select');
            required.push(jq_sel[0]);
          }
          // CHANGING REQUIRED INPUTS BORDER COLOR INTO RED
          for(var i=0; i<required.length; i++) {
            required[i].style.borderColor = 'red';
          }
          warning.style.display = 'block';
        }
        else  {
          document.getElementById("pills-experience-tab").click(); 
          warning.style.display = 'none';
          scroll_to_form();
        }
      break;
  
      // Casr Experience Tab
      case 'btn-experience-next':
        var required = [];
        var jq_selects = [];
        var jq_radio = [];
        var errors = false;
  
        var experienced = document.querySelector('input[name="experienced"]:checked');
  
        if(experienced == null) errors = true;
        else {
          if(experienced.value == '1') {
            // ADDING REQUIRED INPUTS INTO MASSIVE CASE VALUE TRUE
            required.push (document.querySelector('input[name="job1-organization"]'));
            required.push (document.querySelector('input[name="job1-position"]'));
            required.push (document.getElementById('job1-duties'));
            required.push (document.getElementById('job1-beginning-month'));
            required.push (document.getElementById('job1-beginning-year'));
            required.push (document.getElementById('job1-finished-month'));
            required.push (document.getElementById('job1-finished-year'));
            // ADDING REQUIRED IPUTS INTO MASSIVE CASE ADDITIONAL EXPERIENCE IS ACTIVE
            var add_experience = document.getElementById('additional_experience');
            if(add_experience.style.display == 'flex') {
              required.push (document.querySelector('input[name="job2-organization"]'));
              required.push (document.querySelector('input[name="job2-position"]'));
              required.push (document.getElementById('job2-duties'));
              required.push (document.getElementById('job2-beginning-month'));
              required.push (document.getElementById('job2-beginning-year'));
              required.push (document.getElementById('job2-finished-month'));
              required.push (document.getElementById('job2-finished-year'));
            }
          }
        }
  
        // ACCEPTING ERROR IF FIELDS ARE NOT FILLED
        for(var i=0; i<required.length; i++) 
        if(required[i].value == '') errors = true; 
  
        if(errors) {
          // ADDING SIMPLE INPUT INTO MASSIVE TO ALSO CHANGE BORDER COLOR
          required.push (document.querySelector('input[name="job2-organization"]'));
          required.push (document.querySelector('input[name="job2-position"]'));
          required.push (document.getElementById('job2-duties'));
          required.push (document.querySelector('input[name="job1-organization"]'));
          required.push (document.querySelector('input[name="job1-position"]'));
          required.push (document.getElementById('job1-duties'));
          // ADDING JQUERY RADIO INTO MASSIVE
          jq_radio = document.getElementById('pills-experience').getElementsByClassName('jq-radio');
          for(var x=0; x<jq_radio.length; x++)
            required.push(jq_radio[x]);
          jq_selects.push(document.getElementById('job1-beginning-month-styler'));
          jq_selects.push(document.getElementById('job1-beginning-year-styler'));
          jq_selects.push(document.getElementById('job1-finished-month-styler'));
          jq_selects.push(document.getElementById('job1-finished-year-styler'));
          jq_selects.push(document.getElementById('job2-beginning-month-styler'));
          jq_selects.push(document.getElementById('job2-beginning-year-styler'));
          jq_selects.push(document.getElementById('job2-finished-month-styler'));
          jq_selects.push(document.getElementById('job2-finished-year-styler'));
  
          for(var z=0; z<jq_selects.length; z++) {
            var jq_sel = jq_selects[z].getElementsByClassName('jq-selectbox__select');
            required.push(jq_sel[0]);
          }
          // CHANGING REQUIRED INPUTS BORDER COLOR INTO RED
          for(var i=0; i<required.length; i++) {
            required[i].style.borderColor = 'red';
          }
          warning.style.display = 'block';
        }
        else  {
          document.getElementById("pills-additional-tab").click(); 
          warning.style.display = 'none';
          scroll_to_form();
        }
        
      break;
  
      //Case Additional tab
      case 'btn-additional-next' :
        document.getElementById("pills-send-tab").click();
        scroll_to_form();
      break;
  
    }  //Switch End
  } //function form_next_tab End
  