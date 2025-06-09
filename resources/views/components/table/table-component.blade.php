@props(['title' => null, 'labels', 'values', 'functionClose' => null])

<div style="width: 100%;">
    @if($title)
        <h3 class="mb-3">{{ $title }}</h3>
    @endif

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />

    <div class="buttons-area mb-3">
        <a href="{{ route('export.pdf') }}" class="btn btn-outline-secondary me-2" target="_blank" title="Exportar PDF">
            <i class="bi bi-file-earmark-bar-graph fs-4"></i>
        </a>
        <button class="btn btn-outline-primary me-2" id="addRow" type="button" title="Adicionar linha">
            <i class="bi bi-plus fs-4"></i>
        </button>
        @if($functionClose)
            <button class="btn btn-outline-danger" type="button" onclick="{{ $functionClose }}()" title="Fechar">
                <i class="bi bi-x fs-4"></i>
            </button>
        @endif
    </div>

    <div class="mb-3 mt-3">
        <input type="text" id="searchInput" class="form-control" placeholder="Filtrar tabela..." />
    </div>

    <div class="table-responsive text-nowrap">
        <table class="table table-bordered" id="filterTable">
            <thead class="table-dark">
                <tr>
                    @foreach ($labels as $label)
                        <th>{{ $label }}</th>
                    @endforeach
                    <th style="width:150px;">Ações</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @forelse ($values as $row)
                    <tr data-id="{{ $row['id'] ?? 0 }}">
                        @foreach ($row as $cell)
                            <td>{{ $cell }}</td>
                        @endforeach
                        <td>
                            <button class="btn btn-sm btn-primary edit-row" title="Editar">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <button class="btn btn-sm btn-success save-row" title="Salvar" style="display:none;">
                                <i class="bi bi-check-lg"></i>
                            </button>
                            <button class="btn btn-sm btn-secondary cancel-edit" title="Cancelar" style="display:none;">
                                <i class="bi bi-x-lg"></i>
                            </button>
                            <button class="btn btn-sm btn-danger delete-row" title="Excluir">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
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

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('searchInput');
    const table = document.getElementById('filterTable');
    const tbody = table.tBodies[0];
    const addRowBtn = document.getElementById('addRow');
    const labels = @json($labels);

    // Setup Axios with CSRF token
    const tokenMeta = document.head.querySelector('meta[name="csrf-token"]');
    if (tokenMeta) {
        axios.defaults.headers.common['X-CSRF-TOKEN'] = tokenMeta.content;
    } else {
        console.error('CSRF token not found');
    }
    axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

    // Filter table rows by search input
    searchInput.addEventListener('input', () => {
        const filter = searchInput.value.toLowerCase();
        Array.from(tbody.rows).forEach(row => {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(filter) ? '' : 'none';
        });
    });

    // Add new row with default values
    addRowBtn.addEventListener('click', () => {
        const newRow = tbody.insertRow();
        newRow.setAttribute('data-id', '0');

        labels.forEach(label => {
            const cell = newRow.insertCell();
            cell.textContent = `Novo ${label}`;
        });

        const actionCell = newRow.insertCell();
        actionCell.innerHTML = `
            <button class="btn btn-sm btn-primary edit-row" title="Editar">
                <i class="bi bi-pencil"></i>
            </button>
            <button class="btn btn-sm btn-success save-row" title="Salvar" style="display:none;">
                <i class="bi bi-check-lg"></i>
            </button>
            <button class="btn btn-sm btn-secondary cancel-edit" title="Cancelar" style="display:none;">
                <i class="bi bi-x-lg"></i>
            </button>
            <button class="btn btn-sm btn-danger delete-row" title="Excluir">
                <i class="bi bi-trash"></i>
            </button>
        `;
    });

    // Event delegation for buttons inside tbody
    tbody.addEventListener('click', e => {
        const target = e.target.closest('button');
        if (!target) return;

        const row = target.closest('tr');
        if (!row) return;

        if (target.classList.contains('edit-row')) {
            startEditing(row);
        } else if (target.classList.contains('save-row')) {
            saveRow(row);
        } else if (target.classList.contains('cancel-edit')) {
            cancelEditing(row);
        } else if (target.classList.contains('delete-row')) {
            deleteRow(row);
        }
    });

    function startEditing(row) {
        const cells = Array.from(row.cells);
        for (let i = 0; i < cells.length - 1; i++) {
            const cell = cells[i];
            const text = cell.textContent.trim();
            cell.setAttribute('data-old-value', text);
            cell.innerHTML = `<input type="text" class="form-control form-control-sm" value="${text.replace(/"/g, '&quot;')}" />`;
        }
        toggleActionButtons(row, true);
    }

    function saveRow(row) {
        const inputs = row.querySelectorAll('input');
        const data = {};
        inputs.forEach((input, i) => {
            row.cells[i].textContent = input.value.trim();
            data[labels[i]] = input.value.trim();
        });
        toggleActionButtons(row, false);

        const id = row.getAttribute('data-id');

        if (id && id !== '0') {
            // Atualiza plano existente
            axios.put(`/provider/alterPlans/${id}`, data)
                .then(response => {
                    console.log('Plano atualizado:', response.data);
                    // Atualizar o ID caso retorne
                    if (response.data.id) {
                        row.setAttribute('data-id', response.data.id);
                    }
                })
                .catch(error => {
                    console.error('Erro ao atualizar plano:', error);
                    alert('Erro ao salvar o plano');
                    cancelEditing(row);
                });
        } else {
            // Cria novo plano
            axios.post('/provider/store', data)
                .then(response => {
                    console.log('Plano criado:', response.data);
                    if (response.data.id) {
                        row.setAttribute('data-id', response.data.id);
                    }
                })
                .catch(error => {
                    console.error('Erro ao criar plano:', error);
                    alert('Erro ao salvar o plano');
                    cancelEditing(row);
                });
        }
    }

    function cancelEditing(row) {
        const cells = Array.from(row.cells);
        for (let i = 0; i < cells.length - 1; i++) {
            const oldValue = cells[i].getAttribute('data-old-value');
            cells[i].textContent = oldValue ?? '';
            cells[i].removeAttribute('data-old-value');
        }
        toggleActionButtons(row, false);
    }

    function deleteRow(row) {
        if (!confirm('Deseja realmente deletar esta linha?')) return;

        const id = row.getAttribute('data-id');
        if (id && id !== '0') {
            axios.delete(`/provider/removePlan/${id}`)
                .then(response => {
                    console.log('Plano deletado:', response.data);
                    row.remove();
                })
                .catch(error => {
                    console.error('Erro ao deletar plano:', error);
                    alert('Erro ao deletar o plano');
                });
        } else {
            row.remove();
        }
    }

    function toggleActionButtons(row, editing) {
        row.querySelector('.edit-row').style.display = editing ? 'none' : 'inline-block';
        row.querySelector('.delete-row').style.display = editing ? 'none' : 'inline-block';
        row.querySelector('.save-row').style.display = editing ? 'inline-block' : 'none';
        row.querySelector('.cancel-edit').style.display = editing ? 'inline-block' : 'none';
    }
});
</script>
