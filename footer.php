<footer id="footer" class="fixed bottom-0 inset-x-0 z-50 bg-blue-800 text-white max-w-full">
           
            <!--flex container-->
            <div class="container flex flex-row mx-auto px-2 gap-1 py-2 justify-between text-sm">
                <a href="acchome.php" class="footer-btn flex flex-col justify-between items-center"><i class="ri-bank-fill"></i>
                <span>Accounts</span></a>
                <a href="payments.php" class="footer-btn flex flex-col justify-between items-center"><i class="ri-exchange-dollar-fill"></i>
                <span>Payments</span></a>
                <a href="transfers.php" class="footer-btn flex flex-col justify-between items-center"><i class="ri-arrow-left-right-fill"></i>
                <span>Transfers</span></a>
                <a href="dashboard.php" class="footer-btn flex flex-col justify-between items-center"><i class="ri-git-commit-line">

                </i><span>Home..</span></a>
            </div>

        </footer>
        

    </div>
    
    <script src="./js/script.js"></script>
    <script>
        const searchInput = document.getElementById('searchInput');
        const dateFilter = document.getElementById('dateFilter');
        const tableBody = document.getElementById('tableBody');

        // Sample data (you can replace it with your actual data)
        const data = [
            { date: '2024-05-01', description: 'Transaction 1', amount: '$100.00' },
            { date: '2024-05-02', description: 'Transaction 2', amount: '$150.00' },
            { date: '2024-05-03', description: 'Transaction 3', amount: '$200.00' },
            // Add more data as needed
        ];

        // Function to render table rows based on data
        function renderTable() {
            tableBody.innerHTML = '';

            data.forEach(item => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td class="border px-4 py-2">${item.date}</td>
                    <td class="border px-4 py-2">${item.description}</td>
                    <td class="border px-4 py-2">${item.amount}</td>
                `;
                tableBody.appendChild(row);
            });
        }

        // Initial rendering
        renderTable();

        // Event listeners for search and date filter
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const filteredData = data.filter(item => 
                item.description.toLowerCase().includes(searchTerm)
            );
            renderTable(filteredData);
        });

        dateFilter.addEventListener('change', function() {
            const selectedDate = this.value;
            const filteredData = data.filter(item => item.date === selectedDate);
            renderTable(filteredData);
        });
    </script>

    
</body>
</html>