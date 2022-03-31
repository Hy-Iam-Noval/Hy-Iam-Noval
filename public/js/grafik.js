let datas = []
for (let i = 0; i < 12; i++) {
    datas.push((data[new Date().getFullYear()][i] == undefined) ? 0 : data[new Date().getFullYear()][i].length)
}
const ctx = document.getElementById('grafik');
const myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['January', 'Febuary', 'March', 'April', 'May', 'Juny', 'July', 'August', 'September', 'October', 'November', 'December'],
        datasets: [{
            label: 'Ordering this year',
            data: datas,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 3
        }]
    }
})