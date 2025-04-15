# Introdução
A ideia aqui é montar um plano de estudos totalmente voltado para a prática, com o
objetivo de te fazer evoluir como desenvolvedor PHP através da construção de um projeto
real.

**Mas atenção:** o foco não é simplesmente resolver um desaﬁo. A proposta é que você use
o desaﬁo como base para aplicar cada conceito aprendido, passo a passo. A cada nova
habilidade, o projeto deverá ser melhorado, refatorado ou expandido, tornando-se cada
vez mais estruturado.

Portanto, não comece implementando o desaﬁo diretamente. Primeiro, vá estudando
cada tópico proposto no plano de estudos, absorvendo bem os conceitos e buscando
aplicá-los de forma prática no sistema. A evolução do projeto será uma consequência
natural do seu aprendizado.
## O desaﬁo
Uma empresa de cobrança de dívidas está captando potenciais clientes (leads) de várias
formas: anúncios no Google, Facebook, Instagram, representantes comerciais, outdoors,
rádio e até TV.

**Isso tem gerado um problema:** os leads vêm de diversas fontes, e atualmente não existe
um sistema para importar e gerenciar esses dados. Além disso, em alguns casos é
necessário exportar esses dados — por exemplo, representantes podem captar e-mails,
importar no sistema usando por exemplo um JSON, e depois precisam exportar esses
dados em um formato que o Google Ads aceite, como CSV.

**Com base nisso, desenvolva um sistema que:**
- Leia dados de várias fontes e grave no banco de dados local.
 Exemplos de fontes:
CSV, XML, JSON, banco de dados MySQL, banco de dados PostgreSQL.

- Independente da origem dos dados, permita exportar as informações nos
formatos: CSV, XML, JSON, XLSX, PDF e E-mail.

O sistema deve ser feito em MVC e deve evoluir ao longo do tempo conforme os conceitos
do plano de estudos forem sendo aprendidos e aplicados.

Você pode usar o Composer e bibliotecas para funcionalidades mais especíﬁcas (ex:
leitura de arquivos XLSX com PhpSpreadsheet). 

No entanto, para fontes como CSV, XML,
JSON, MySQL e PostgreSQL, utilize PHP puro. Para o frontend, pode usar jQuery.
Você mesmo deve montar arquivos de exemplo (CSV, XML etc.) e trabalhar em cima deles.

Recomendo a utilização do ChatGPT para explicação dos novos conhecimentos, ele
explicará bem algo que possa não estar bem claro.

Utilize Docker + nginx ou apache.

Recomendação: usar Ubuntu em vez do Windows para desenvolver.

## Plano de estudos
### Passo 1: Ambiente e Ferramentas
Objetivo: Estar com o ambiente de desenvolvimento totalmente pronto para trabalhar
com qualidade e produtividade.

- Instalar e conﬁgurar o PhpStorm
- Aprender o básico de uso do PhpStorm: navegação, execução, atalhos e
ferramentas de inspeção.
- Instalar e conﬁgurar o Xdebug
- Aprender a depurar com PhpStorm + Xdebug
- Aprender sobre o PSR-1, PSR-2, PSR-12, e sobre como o PhpStorm os aplica de
forma automática
### Passo 2: Estrutura Inicial e PSR-4
Objetivo: Montar a base do projeto com carregamento automático correto e estrutura
básica MVC.
- O que é o PSR-4 e como funciona
- Composer e PSR-4: como conﬁgurar autoload
- Criar estrutura de pastas com namespaces
- Rodar composer dump-autoload e testar carregamento de classes
- Organização de pastas de acordo com a responsabilidade
- Como redirecionar todas as requisições para o index.php dentro da pasta public, e
manter a pasta public isolada do código da aplicação
### Passo 3: Fundamentos de OOP e Princípios SOLID
Objetivo: Aplicar orientação a objetos e SOLID com boas práticas desde o início.
- Revisar OOP (encapsulamento, herança, polimorﬁsmo, associação etc.)
- Aprender sobre interfaces, traits e classes abstratas.
- Estudar sobre o SOLID e como funciona.
- A partir daqui, já pode começar a implementar o projeto com base nos
conhecimentos adquiridos
- Pensar em uma estrutura que utilize interfaces e classes abstratas para criar
classes responsáveis pela leitura e escrita dos dados de acordo com o desaﬁo, e
de acordo com os princípios SOLID.
- Aplicar SRP nas classes criadas- Aplicar OCP para facilitar adição de novos classes de leitura e escrita. Ex: criando
AbstractReader, AbstractWriter
- Aplicar LSP garantindo que todas as implementações funcionem de forma
intercambiável, utilizando interfaces
- Aplicar ISP separando responsabilidades se necessário
- Aplicar DIP para evitar dependências concretas nas classes principais
### Passo 4: Injeção de Dependências e Containers
Objetivo: Separar instanciamento das dependências das classes de controller, model e
view.
- Estudar sobre o que é injeção de dependências e containers.
- Criar um container simples (pode usar PHP-DI ou criar um container básico
manualmente)
- Refatorar controllers e models para receber dependências via injeção
- Evitar instanciar objetos diretamente em qualquer parte do sistema: em vez disso,
utilizar o container
- Aprender sobre factories, e generic factories
### Passo 5: Organização e Boas Práticas
Objetivo: Adotar práticas que deixam o código limpo, legível e sustentável.
- Evitar aninhamento de ifs e outras estruturas, aplicar early return
- Evitar métodos estáticos desnecessários
- Evitar arrays genéricos onde deveria haver objetos
- Criar e usar objetos de domínio (ex: Lead, Source, ExportData)
- Padronizar validações, tratamento de erros e mensagens
### Passo 6: Separação de responsabilidades na arquitetura MVC
Objetivo: Melhorar a separação de responsabilidades dentro do MVC.
Estude sobre como separar cada responsabilidade das classes. Ex:
- Criar Repositories para acesso a dados
- Criar Services para regras de negócio
- Criar Validators para validações especíﬁcas
- Criar Filters para tratamento de dados de entrada-
Utilizar Entities/DTOs/Value Objects se necessário
### Passo 7: Roteamento
Objetivo: Implementar um roteador simples e funcional.
- Apesar de não ser necessário implementar roteamento nos frameworks, é
importante estudar sobre como funciona esse roteamento
- Criar sistema de rotas básico (ex: lendo o $_SERVER['REQUEST_URI'] e decidir
para qual controller mandar com base na URL)
- Suportar controllers e actions com parâmetros
### Passo 8: Javascript: Revealing Module Pattern
Objetivo: Aprender a modularizar JS no frontend com clareza.
- Criar scripts JS para interações na tela (ex: selecionar origem, destino, mostrar
preview de dados)
- Usar Revealing Module Pattern para organizar o JS
- Separar responsabilidades (ex: módulo para importar, módulo para exportar)
- Separação dos arquivos JS de acordo com a responsabilidade/página/módulo