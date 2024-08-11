function previewImage(image) {
  Swal.fire({
    imageUrl: image,
    imageWidth: 400,
    imageHeight: 400,
    buttonsStyling: false,
    customClass: {
      confirmButton: "btn btn-primary",
    },
  });
}
