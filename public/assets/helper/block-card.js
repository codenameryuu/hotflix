function blockCard() {
  const card = $(".card");
  card.block({
    message: '<div class="spinner-border text-primary" role="status"></div>',
    css: {
      backgroundColor: "transparent",
      border: "0",
    },
    overlayCSS: {
      backgroundColor: "#fff",
      opacity: 0.8,
    },
  });
}

function unblockCard() {
  const card = $(".card");
  card.unblock();
}
