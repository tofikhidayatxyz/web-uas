import ApexCharts from "apexcharts";

// document.addEventListener('DOMContentLoaded', () => {
// 	const grade = document.querySelector('#grade');

// 	document.querySelector('#nilai').addEventListener('keyup', (e) => {
// 		const val = parseFloat(e.target.value);
// 		if (val < 40) {
// 			grade.textContent('D');
// 		} else if ((val > 40) & (val < 70)) {
// 			grade.textContent('C');
// 		} else if ((val > 70) & (val < 70)) {
// 			grade.textContent('C');
// 		}
// 	});
// });

document.addEventListener("DOMContentLoaded", () => {
    const chartRoot = document.querySelector("#best-product-chart");

    const options = {
        series: [
            {
                name: "series1",
                data: [31, 40, 28, 51, 42, 109, 100, 100],
            },
        ],
        fill: {
            colors: ["#FF994F"],
        },
        chart: {
            height: 280,
            type: "area",
            toolbar: {
                show: false,
            },
        },
        dataLabels: {
            enabled: false,
        },
        stroke: {
            curve: "smooth",
            width: 3,
            fill: "#FF994F",
        },
        xaxis: {
            type: "category",
            categories: [2015, 2016, 2017, 2018, 2019, 2020, 2021, 2022],
        },
        yaxis: {
            show: false,
        },
        grid: {
            show: true,
            borderColor: "#F7F7F7",
            strokeDashArray: 3,
            position: "back",
            xaxis: {
                lines: {
                    show: true,
                },
            },
            yaxis: {
                lines: {
                    show: true,
                },
            },
        },
        tooltip: {
            x: {
                format: "dd/MM/yy HH:mm",
            },
        },
    };

    var chart = new ApexCharts(chartRoot, options);
    chart.render();
});

/// scrolled header

const checkScroll = () => {
    const header = document.querySelector("header");
    if (window.innerWidth > 768) {
        if (window.scrollY > 50) {
            header.classList.add("scroll");
        } else {
            header.classList.remove("scroll");
        }
    }
};

window.addEventListener("scroll", checkScroll);
document.addEventListener("DOMContentLoaded", checkScroll);

document.addEventListener("DOMContentLoaded", () => {
    document.querySelector("#nabar-toggle").addEventListener("click", () => {
        document.querySelector("#navbar").classList.toggle("hidden");
    });
});
