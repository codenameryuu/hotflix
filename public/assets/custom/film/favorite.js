function addFavorite(id) {
  const classFavouriteActive = "item__favorite--active";
  const btnFavorite = $(`#btnFavorite${id}`);

  axios
    .post("/film/add-favorite", {
      film_id: id,
      _token: $('meta[name="csrf-token"]').attr("content"),
    })
    .then((response) => {
      const message = response.data.message;
      const createOrDelete = response.data.createOrDelete;

      notifyInfo(message);

      if (createOrDelete == "create") {
        btnFavorite.removeClass(classFavouriteActive);
        btnFavorite.addClass(classFavouriteActive);
      } else {
        btnFavorite.removeClass(classFavouriteActive);
      }
    });
}
