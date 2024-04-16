
function filtrarDados() {
    // Aqui você fará a requisição para obter os dados filtrados do servidor (usando Ajax, por exemplo)
    // Suponha que você obtenha os dados filtrados como um array chamado 'dadosFiltrados'
    // var dadosFiltrados = [5, 10, 15, 20, 25, 30];

    // Atualize os dados do gráfico
    myChart.data.datasets[0].data = dadosFiltrados;
    myChart.update();
}
