const links = document.querySelectorAll(".itemLinks");

const descriptions = document.querySelectorAll("#descriptionContainer .description");

links.forEach(link => {
  link.addEventListener("click", function (e) {

    links.forEach(l => l.classList.remove("active"));

    const clickedLink = e.currentTarget;

    const position = clickedLink.getAttribute("data-pos");

    const translateValue = `translate3d(${position * 25}%, 0px, 0)`;

    document.querySelector("#wrapper").style.transform = translateValue;

    clickedLink.classList.add("active");

    descriptions.forEach(desc => desc.style.display = "none");
    const activeDesc = document.querySelector(`#descriptionContainer .description[data-pos="${position}"]`);
    
    if (activeDesc) {
      activeDesc.style.display = "block";
    }

  });
});

if (links.length > 0) {
  links[0].classList.add("active");
}

if (descriptions.length > 0) {
  descriptions.forEach(desc => desc.style.display = "none");
  descriptions[0].style.display = "block";
}