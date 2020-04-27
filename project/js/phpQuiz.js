
/**
 * To ask for confirm logout
 */
function confirmationLogout()
  {
    var conf = confirm('Are you sure want to Logout?');
    if(conf){
      return true;
    }
    else{
      return false;
    }
        
}

/**
 * To hide menu bar when click outside
 */
$(document).click(function(e) {
    if (!$(e.target).is('.panel-body')) {
        $('.collapse').collapse('hide');	    
    }
});

/**
 * To create print reday version of page
 */
function printPage() {
    self.print();
}

/**
 * To count number of correct answer
 * @param {char}     id       id of given element
 * @param {char}     correct  correct answer
 * @param {integer}  counter  counter to track number of correct answer
 */
function checkResult(id,correct,counter) {
  var img = document.createElement('img'); 
  var elems = document.getElementsByClassName("btn");
  
  for(var i = 0; i < elems.length; i++) {
      elems[i].disabled = true;
  }

  if(id==correct){
      document.getElementById("next").disabled = false;
      document.getElementById(correct).style.background = "#348017";
      document.getElementById(id).style.border="5px solid #348017";
      document.getElementById(correct).style.color = "#fff";   
      document.getElementById("count").value=counter+1;
  }
  else{
      document.getElementById("next").disabled = false;
      document.getElementById(id).style.background = "#c8362e";
      document.getElementById(id).style.border="5px solid #c8362e";
      document.getElementById(id).style.color = "#fff";
      document.getElementById("count").value=counter;
  }
}

/**
 *  To disable next button
 */
function btnDisable() {
  var element = document.getElementById("next");
  if(element!=null){
    document.getElementById("next").disabled = true;
  }
}