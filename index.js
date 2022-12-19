const buttonComments = document.querySelector(".btn-hide-comments");
const commentsDiv = document.querySelector(".comments");
buttonComments.addEventListener("click", function () {
  // console.log("clicked");
  if (!commentsDiv.classList.contains("hide")) {
    commentsDiv.classList.add("hide");
    buttonComments.innerHTML = "Show comments";
  } else {
    commentsDiv.classList.remove("hide");
    buttonComments.innerHTML = "Hide comments";
  }
});