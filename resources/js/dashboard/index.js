window.addEventListener("load", () => {
    // Apex Doughnut Chart
    (function () {
        buildChart(
            "#hs-doughnut-chart",
            (mode) => ({
                chart: {
                    height: 230,
                    width: 230,
                    type: "donut",
                    zoom: {
                        enabled: false,
                    },
                },
                plotOptions: {
                    pie: {
                        donut: {
                            size: "76%",
                        },
                    },
                },
                series: [47, 23, 30],
                labels: ["Tailwind CSS", "Preline UI", "Others"],
                legend: {
                    show: false,
                },
                dataLabels: {
                    enabled: false,
                },
                stroke: {
                    width: 5,
                },
                grid: {
                    padding: {
                        top: -12,
                        bottom: -11,
                        left: -12,
                        right: -12,
                    },
                },
                states: {
                    hover: {
                        filter: {
                            type: "none",
                        },
                    },
                },
                tooltip: {
                    enabled: true,
                    custom: function (props) {
                        return buildTooltipForDonut(
                            props,
                            mode === "dark"
                                ? ["#fff", "#fff", "#000"]
                                : ["#fff", "#fff", "#000"]
                        );
                    },
                },
            }),
            {
                colors: ["#3b82f6", "#22d3ee", "#e5e7eb"],
                stroke: {
                    colors: ["rgb(255, 255, 255)"],
                },
            },
            {
                colors: ["#3b82f6", "#22d3ee", "#404040"],
                stroke: {
                    colors: ["rgb(38, 38, 38)"],
                },
            }
        );
    })();
});
