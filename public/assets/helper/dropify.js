const dropify = $(".dropify");
const dropifyImage = $(".dropify-image");
const dropifyPdf = $(".dropify-pdf");

if (dropify.length) {
  const message = '<span class="dropify-message-custom"> Klik atau taruh file disini </span>';

  dropify.dropify({
    messages: {
      default: message,
      replace: message,
      remove: "Hapus",
      error: "",
    },
    error: {
      fileSize: "Ukuran file terlalu besar (maksimal 5 MB) !",
      fileExtension: "Ekstensi file tidak valid (hanya menerima jpg, jpeg png, atau pdf) !",
    },
  });
}

if (dropifyImage.length) {
  const message = '<span class="dropify-message-custom"> Klik atau taruh file disini </span>';

  dropifyImage.dropify({
    messages: {
      default: message,
      replace: message,
      remove: "Hapus",
      error: "",
    },
    error: {
      fileSize: "Ukuran file terlalu besar (maksimal 5 MB) !",
      fileExtension: "Ekstensi file tidak valid (hanya menerima jpg, jpeg atau png) !",
    },
  });
}

if (dropifyPdf.length) {
  const message = '<span class="dropify-message-custom"> Klik atau taruh file disini </span>';

  dropifyPdf.dropify({
    messages: {
      default: message,
      replace: message,
      remove: "Hapus",
      error: "",
    },
    error: {
      fileSize: "Ukuran file terlalu besar (maksimal 5 MB) !",
      fileExtension: "Ekstensi file tidak valid (hanya menerima pdf) !",
    },
  });
}
