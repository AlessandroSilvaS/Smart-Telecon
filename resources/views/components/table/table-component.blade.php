@props(['title', 'labels', 'values', 'functionClose'])

<div style="width: 100%">
    @if($title)
        <h3 class="mb-3">{{ $title }}</h3>
    @endif

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
    <div class="buttons-area">
        <a href="{{ route('export.pdf') }}" class="buttons-area-buttons" target="_blank">
            <i class="bi bi-file-earmark-bar-graph fs-4"></i>
        </a>
        <!-- Simples botão "Create" -->
        <button class="buttons-area-buttons" id="addRow">
            <i class="bi bi-plus fs-4"></i>
        </button>
        <button class="buttons-area-buttons" onclick="{{ $functionClose }}()" type="button" data-bs-toggle="modal" data-bs-target="#modalCenter">
            <i class="bi bi-x fs-4"></i>
        </button>
    </div>

    <!-- Campo de busca -->
    <div class="mb-3 mt-3">
        <input type="text" id="searchInput" class="form-control" placeholder="Filtrar tabela..." />
    </div>

    <div class="table-responsive text-nowrap">
        <table class="table" id="filterTable">
            <thead class="table-dark">
                <tr>
                    @foreach ($labels as $label)
                        <th>{{ $label }}</th>
                    @endforeach
                    <th>Ações</th> <!-- coluna extra para o delete -->
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @forelse ($values as $row)
                    <tr style="cursor: pointer;">
                        @foreach ($row as $cell)
                            <td>{{ $cell }}</td>
                        @endforeach
                        <td><button class="btn btn-sm btn-danger delete-row"><i class="bi bi-trash"></i></button></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="{{ count($labels) + 1 }}" class="text-center">Nenhum dado disponível</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('searchInput');
        const table = document.getElementById('filterTable');
        const tbody = table.tBodies[0];
        const addRowBtn = document.getElementById('addRow');

        // Filtro
        searchInput.addEventListener('input', function () {
            const filter = searchInput.value.toLowerCase();
            Array.from(tbody.rows).forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(filter) ? '' : 'none';
            });
        });

        // Delete (delegado)
        tbody.addEventListener('click', function (e) {
            if (e.target.closest('.delete-row')) {
                e.target.closest('tr').remove();
            }
        });

        // Create (simples: adiciona linha com valores fake)
        addRowBtn.addEventListener('click', function () {
            const newRow = tbody.insertRow();
            @foreach ($labels as $label)
                const cell = newRow.insertCell();
                cell.textContent = "Novo {{ $label }}";
            @endforeach
            const actionCell = newRow.insertCell();
            actionCell.innerHTML = `<button class="btn btn-sm btn-danger delete-row"><i class="bi bi-trash"></i></button>`;
        });
    });
</script>
