if (document.getElementById("error")) {
    document.getElementById("closeModal").style.display = "block";
    closeModal("error");
}

if (document.getElementById("success")) {
    document.getElementById("closeModal").style.display = "block";
    closeModal("success");
}

/**
 * close the modal windows.
 * @param idModal
 */
function closeModal (idModal) {
    document.getElementById("closeModal").addEventListener("click", function () {
        document.getElementById(idModal).style.display = "none";
    });
}