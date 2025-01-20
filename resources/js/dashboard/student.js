import { initDashboard } from "../dashboard";

initDashboard().then((res) => {
    const body = res;
    const userRole = body.authentication.data.role;

    if (userRole === "student") {
        // Response JSON
        const yourConfessions = body.chart.data.yourConfessions;
        const yourResponses = body.chart.data.yourResponses;
        const yourComments = body.chart.data.yourComments;
        const yourLikes = body.chart.data.yourLikes;
        const yourHistoryLogins = body.chart.data.yourHistoryLogins;

        // Set options
        const optionsYourStatistics = {
            series: [
                {
                    name: "Confessions",
                    data: yourConfessions.yAxis,
                },
                {
                    name: "Responses",
                    data: yourResponses.yAxis,
                },
                {
                    name: "Comments",
                    data: yourComments.yAxis,
                },
                {
                    name: "Likes",
                    data: yourLikes.yAxis,
                },
                {
                    name: "Log-ins",
                    data: yourHistoryLogins.yAxis,
                },
            ],
            chart: {
                height: 350,
                type: "area",
                zoom: {
                    enabled: false,
                },
                stacked: false,
            },
            dataLabels: {
                enabled: false,
            },
            stroke: {
                curve: "smooth",
            },
            xaxis: {
                categories: yourConfessions.xAxis,
                type: "datetime",
            },
            yaxis: {
                labels: {
                    formatter: function (value) {
                        return Math.round(value);
                    },
                },
                max:
                    Math.max(
                        ...yourConfessions.yAxis,
                        ...yourResponses.yAxis,
                        ...yourComments.yAxis,
                        ...yourLikes.yAxis,
                        ...yourHistoryLogins.yAxis
                    ) + 1,
            },
            tooltip: {
                x: {
                    format: "dd/MM/yy",
                },
            },
        };

        // Instance chart
        const chartYourStatistics = new ApexCharts(
            document.getElementById("chart-your-statistics"),
            optionsYourStatistics
        );

        // Render
        chartYourStatistics.render();
    }
});
