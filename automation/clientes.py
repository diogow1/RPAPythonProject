from openpyxl import Workbook

wb = Workbook()
ws = wb.active
ws.title = "Clientes"

ws.append(["Nome", "Email", "Telefone", "Endereco"])

# Dados 
clientes = []

for cliente in clientes:
    ws.append(cliente)

wb.save("planilhas/clientes.xlsx")
print("Arquivo Excel 'clientes.xlsx' criado com sucesso.")
