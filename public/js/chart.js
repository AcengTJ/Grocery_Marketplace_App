$(document).ready(function () {
  var startYear = 1800;
  var endYear = new Date().getFullYear;

  for (var i = endYear; i > startYear; i--) {
    $("#yearpicker").append($("<option />").html(i).val(i));
  }
});

function handleFilter(myChart) {
  const year = $("select").val();

  $.ajax({
    type: "GET",
    url: "",
    data: {
      year: year,
    },
    success: function (result) {
      $("#year").text(year);
      myChart.config.data.datasets[0].data = result.data;
      myChart.update(myChart.config);
    },
    error: function (xhr, error) {
      console.log(xhr);
    },
  });
}
