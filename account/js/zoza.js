
  function myFunction() {  
  var txt;  
  if (confirm("Press a button!")) {    
	txt = "You pressed OK!";
  } else {    
	txt = "You pressed Cancel!";
  }  
  document.getElementById("demo").innerHTML = txt;
}

  function myFunction2() {
  // Get the text field  
var copyText = document.getElementById("myInput");
  // Select the text field 
copyText.select();
 // For mobile devices
 copyText.setSelectionRange(0,99999);
   // Copy the text inside the text field
navigator.clipboard.writeText(copyText.value);
  // Alert the copied text
  alert("Copied the text : " + copyText.value);

}

