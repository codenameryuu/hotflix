const form = document.getElementById("formSubmit");

const fv = FormValidation.formValidation(form, {
  fields: {
    search: {
      validators: {
        notEmpty: {
          message: "Search cannot be empty !",
        },
      },
    },
  },
  plugins: {
    trigger: new FormValidation.plugins.Trigger(),
    bootstrap5: new FormValidation.plugins.Bootstrap5({
      eleValidClass: "",
      rowSelector: ".mb-3",
    }),

    submitButton: new FormValidation.plugins.SubmitButton(),
    defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
    autoFocus: new FormValidation.plugins.AutoFocus(),
  },
  init: (instance) => {
    instance.on("plugins.message.placed", function (e) {
      if (e.element.parentElement.classList.contains("input-group")) {
        e.element.parentElement.insertAdjacentElement("afterend", e.messageElement);
      }
    });
  },
}).on("core.form.valid", function () {
  const formSubmit = $("#formSubmit");

  const type = $("#type");
  const year = $("#year");

  if (type.val() == "") {
    type.attr("name", "");
  }

  if (year.val() == "") {
    year.attr("name", "");
  }

  blockCard();
  formSubmit.attr("action", "/film").submit();
});

$(window).scroll(function () {
  const height = $(document).height();
  const page = $("#page");
  const lastPage = $("#lastPage");

  const endOfScroll = $(window).scrollTop() + $(window).height() >= height;
  const canLoadMore = Number(page.val()) <= Number(lastPage.val());

  if (endOfScroll && canLoadMore) {
    loadMore();
  }
});

function loadMore() {
  const spinnerLoadMore = $("#spinnerLoadMore");

  spinnerLoadMore.removeClass("d-none");
  spinnerLoadMore.addClass("d-flex");

  const page = $("#page");
  const type = $("#type");
  const year = $("#year");
  const search = $("#search");

  const nextPage = Number(page.val()) + 1;

  console.log({
    page: nextPage,
    type: type.val(),
    year: year.val(),
    search: search.val(),
  });

  axios
    .get("/film/load-more", {
      params: {
        page: nextPage,
        type: type.val(),
        year: year.val(),
        search: search.val(),
      },
    })
    .then((response) => {
      const status = response.data.status;
      const film = response.data.film;

      page.val(nextPage);

      if (status) {
        const filmList = $("#filmList");

        for (const row of film) {
          const defaultPoster = "/assets/img/covers/cover.jpg";

          const item = `
            <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                <div class="item">
                    <div class="item__cover">
                        <img src="${row.Poster != "N/A" ? row.Poster : defaultPoster}" 
                        data-src="${row.Poster != "N/A" ? row.Poster : defaultPoster}" class="lazyload">

                        <a href="${"/film/" + row.imdbID}" class="item__play">
                            <i class="ti ti-player-play-filled"></i>
                        </a>

                        <button class="item__favorite ${row.is_favorite ? "item__favorite--active" : ""}" type="button">
                            <i class="ti ti-bookmark"></i>
                        </button>
                    </div>

                    <div class="item__content">
                        <h3 class="item__title">
                            <a href="${"/film/" + row.imdbID}">
                                ${row.Title}
                            </a>
                        </h3>

                        <span class="item__category text-white">
                            ${row.Year}
                        </span>
                    </div>
                </div>
            </div>
          `;

          filmList.append(item);
        }
      }

      spinnerLoadMore.removeClass("d-flex");
      spinnerLoadMore.addClass("d-none");
    });
}

function addFavorite(id) {
  // const classFavouriteActive = "item__favorite--active";
  // const btnFavorite = $(`#btnFavorite${id}`);

  axios
    .post("/film/add-favorite", {
      film_id: id,
      _token: $('meta[name="csrf-token"]').attr("content"),
    })
    .then((response) => {
      const message = response.data.message;

      notifyInfo(message);
    });
}
