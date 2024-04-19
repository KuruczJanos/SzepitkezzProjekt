
document.getElementById("showAds").addEventListener("click", function(event) {
    event.preventDefault();
    var adminGetCardsContainer = document.getElementById("adminGetCardsContainer");
    var adminGetUsersContainer = document.getElementById("adminGetUsersContainer");
    if (adminGetCardsContainer.style.display === "none" || adminGetUsersContainer.style.display === "none") {
      adminGetCardsContainer.style.display = "block";
      adminGetUsersContainer.style.display = "none";
    } else {
      adminGetCardsContainer.style.display = "none";
      adminGetUsersContainer.style.display = "block";
    }
  });
document.getElementById("showUsers").addEventListener("click", function(event) {
    event.preventDefault(); // Megakadályozza a gomb alapértelmezett működését (pl. ugrás az URL-re)
    var adminGetUsersContainer = document.getElementById("adminGetUsersContainer");
    var adminGetCardsContainer = document.getElementById("adminGetCardsContainer");
    if (adminGetUsersContainer.style.display === "none" || adminGetCardsContainer.style.display === "none") {
      adminGetUsersContainer.style.display = "block";
      adminGetCardsContainer.style.display = "none";
    } else {
      adminGetUsersContainer.style.display = "none";
      adminGetCardsContainer.style.display = "block";
    }
  });
