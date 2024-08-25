# Web Application with Database Integration

Este repositório contém o código desenvolvido para uma aplicação web integrada a uma base de dados, conforme as especificações da atividade proposta.

## Funcionalidades

1. **Integração com Banco de Dados:**
   - A aplicação está conectada a uma base de dados MySQL utilizando as credenciais definidas no arquivo `dbinfo.inc`.
   - São realizadas operações de verificação e criação de tabelas, além da inserção de registros.

2. **Tabelas Criadas:**
   - **EMPLOYEES:**
     - Armazena informações de funcionários com os seguintes campos:
       - `ID` (INT): Chave primária, autoincrementada.
       - `NAME` (VARCHAR): Nome do funcionário.
       - `ADDRESS` (VARCHAR): Endereço do funcionário.
   - **DEPARTMENTS:**
     - Armazena informações sobre departamentos com os seguintes campos:
       - `ID` (INT): Chave primária, autoincrementada.
       - `DEPARTMENT_NAME` (VARCHAR): Nome do departamento.
       - `LOCATION` (VARCHAR): Localização do departamento.
       - `NUM_EMPLOYEES` (INT): Número de funcionários no departamento.
       - `BUDGET` (DECIMAL): Orçamento alocado para o departamento.

3. **Operações Realizadas:**
   - **Criação de Registros:**
     - A aplicação permite a inserção de novos registros nas tabelas `EMPLOYEES` e `DEPARTMENTS` através de formulários web.
   - **Listagem de Registros:**
     - Embora o código fornecido se concentre na criação de registros, a extensão da aplicação para listar registros é possível e recomendada para visualizar os dados inseridos.

## Estrutura do Código

- **app.php:**
  - Arquivo principal da aplicação, onde as operações de conexão ao banco de dados, verificação/criação de tabelas e inserção de registros são realizadas.

## URL do Vídeo de Demonstração

[Link para o vídeo de demonstração](https://drive.google.com/file/d/1P_jbU51J2N23g_KPMaNY2kiWvsAAQZBx/view?usp=sharing)*
