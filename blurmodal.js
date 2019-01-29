// Get the modal
var modal = document.getElementById('loginModal');
var smodal = document.getElementById('signupModal');

// Get the main container and the body
var body = document.getElementsByTagName('body');
var container = document.getElementById('myContainer');

// Get the open button
var btnOpen = document.getElementById("loginBtn");
var btnSOpen = document.getElementById("signupBtn");
var footBtnOpen = document.getElementById("footsignupBtn");


// Get the close button
var btnClose = document.getElementById("closeModal");
var btnSClose = document.getElementById("closeSModal");

// Open the login modal
btnOpen.onclick = function () {
  modal.className = "Modal is-visuallyHidden";
  setTimeout(function () {
    container.className = "MainContainer is-blurred";
    modal.className = "Modal";
  }, 100);
  container.parentElement.className = "ModalOpen";
}

// Close the login modal
btnClose.onclick = function () {
  modal.className = "Modal is-hidden is-visuallyHidden";
  body.className = "";
  container.className = "MainContainer";
  container.parentElement.className = "";
}

// When the user clicks anywhere outside of the login modal, close it
window.onclick = function (event) {
  if (event.target == modal) {
    modal.className = "Modal is-hidden";
    body.className = "";
    container.className = "MainContainer";
    container.parentElement.className = "";
  }
}

// Open the signup modal
btnSOpen.onclick = function () {
  smodal.className = "Modal is-visuallyHidden";
  setTimeout(function () {
    container.className = "MainContainer is-blurred";
    smodal.className = "Modal";
  }, 100);
  container.parentElement.className = "ModalOpen";
}

//open the signup modal from footer
footBtnOpen.onclick = function () {
  smodal.className = "Modal is-visuallyHidden";
  setTimeout(function () {
    container.className = "MainContainer is-blurred";
    smodal.className = "Modal";
  }, 100);
  container.parentElement.className = "ModalOpen";
}

// Close the signup modal
btnSClose.onclick = function () {
  smodal.className = "Modal is-hidden is-visuallyHidden";
  body.className = "";
  container.className = "MainContainer";
  container.parentElement.className = "";
}

// When the user clicks anywhere outside of the signup modal, close it
window.onclick = function (event) {
  if (event.target == smodal) {
    smodal.className = "Modal is-hidden";
    body.className = "";
    container.className = "MainContainer";
    container.parentElement.className = "";
  }
}