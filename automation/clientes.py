from openpyxl import Workbook

wb = Workbook()
ws = wb.active
ws.title = "Clientes"

ws.append(["Nome", "Email", "Telefone", "Endereco"])


clientes = []

for cliente in clientes:
    ws.append(cliente)

wb.save("../planilhas/clientes.xlsx")
print("'clientes.xlsx' criado com sucesso.")
