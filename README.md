# Mundaú Náutica

Site institucional da **Mundaú Náutica**, loja de peças, acessórios e serviços náuticos em Maceió/AL.

O projeto usa **WordPress** como base de CMS, com foco em presença digital local, SEO, conteúdo educativo e captação de contatos via WhatsApp.

## Objetivo

Criar uma presença digital simples, profissional e sustentável para a Mundaú Náutica.

O site deve ajudar a loja a:

* Ser encontrada no Google por buscas locais.
* Apresentar produtos e serviços com clareza.
* Reforçar confiança e autoridade técnica.
* Direcionar clientes para contato via WhatsApp.
* Apoiar conteúdos educativos sobre manutenção, acessórios e navegação.
* Reduzir dependência exclusiva de fluxo presencial e indicação.

## Contexto do negócio

A Mundaú Náutica é uma loja local voltada para clientes que possuem embarcações, motores de popa ou precisam de peças, acessórios, orientação técnica e serviços náuticos.

O diferencial do negócio não é apenas vender produtos. A loja também oferece conhecimento prático, experiência técnica e atendimento direto para quem precisa resolver problemas reais com embarcações e motores.

Mensagem central do projeto:

> Peças, acessórios e serviços náuticos em Maceió, com orientação de quem entende.

## Stack inicial

* WordPress
* Docker
* Docker Compose
* MariaDB
* PHP/Apache via imagem oficial do WordPress

## Estrutura esperada

```txt
.
├── compose.yaml
├── .env.example
├── .gitignore
├── README.md
├── AGENTS.md
├── ROADMAP.md
└── docs/
    ├── project-brief.md
    ├── technical-guidelines.md
    └── specs/
        ├── 001-local-wordpress-infra.md
        └── 002-base-wordpress-theme.md
```

## Desenvolvimento local

A infraestrutura local será baseada em Docker Compose.

A primeira etapa do projeto é subir um ambiente local com:

* WordPress
* Banco de dados
* Volumes nomeados
* Rede Docker compartilhada
* Configuração via `.env`

## Requisitos

Antes de rodar o projeto, instale:

* Docker
* Docker Compose

Verifique as versões:

```bash
docker --version
docker compose version
```

## Configuração inicial

Copie o arquivo de exemplo de variáveis de ambiente:

```bash
cp .env.example .env
```

Depois, ajuste os valores no `.env`, se necessário.

Exemplo de variáveis esperadas:

```env
WORDPRESS_PORT=8080

WORDPRESS_DB_NAME=mundau_nautica
WORDPRESS_DB_USER=wordpress
WORDPRESS_DB_PASSWORD=wordpress_password
WORDPRESS_DB_HOST=database

MYSQL_DATABASE=mundau_nautica
MYSQL_USER=wordpress
MYSQL_PASSWORD=wordpress_password
MYSQL_ROOT_PASSWORD=root_password
```

> O arquivo `.env` não deve ser commitado.

## Subindo o ambiente

Para subir os containers:

```bash
docker compose up -d
```

Depois acesse o WordPress no navegador usando a porta definida em `WORDPRESS_PORT`:

```txt
http://localhost:${WORDPRESS_PORT}
```

Com o valor padrão do `.env.example`, o endereço será `http://localhost:8080`.

## Parando o ambiente

Para parar e remover os containers sem apagar os dados persistidos:

```bash
docker compose down
```

## Removendo tudo, incluindo dados locais

Para remover containers, rede e volumes:

```bash
docker compose down -v
```

Atenção: esse comando apaga os volumes Docker e remove os dados locais do banco.

Use apenas quando quiser resetar completamente o ambiente.

## Volumes

O projeto deve usar volumes nomeados para persistência dos dados locais.

Volumes esperados:

* volume do banco de dados
* volume dos arquivos do WordPress, se aplicável

Os nomes exatos devem ser definidos no `compose.yaml`.

## Rede Docker

Os serviços devem compartilhar uma rede Docker nomeada.

O WordPress deve se comunicar com o banco usando o nome do serviço definido no Compose, não `localhost`.

Exemplo:

```env
WORDPRESS_DB_HOST=database
```

## Tema WordPress

O tema customizado fica em:

```txt
wp-content/themes/mundau-nautica
```

Com o ambiente ativo, o tema pode ser habilitado no painel:

```txt
Aparência > Temas > Mundaú Náutica > Ativar
```

Se o ambiente já estiver rodando, aplique a montagem local do tema com:

```bash
docker compose up -d
```

### Imagem do hero

A imagem principal da homepage pode ser configurada no painel do WordPress:

```txt
Aparência > Personalizar > Mundaú Náutica > Imagem do hero
```

Se nenhuma imagem for selecionada, o tema mantém o fundo visual padrão.

### Imagem da loja

A foto da seção de atendimento técnico pode ser configurada em:

```txt
Aparência > Personalizar > Mundaú Náutica > Imagem da loja
```

Se nenhuma imagem for selecionada, o tema mantém o placeholder visual.

## Convenções do projeto

Este projeto deve seguir as orientações documentadas em:

* `AGENTS.md`
* `ROADMAP.md`
* `docs/project-brief.md`
* `docs/technical-guidelines.md`
* `docs/specs/001-local-wordpress-infra.md`
* `docs/specs/002-base-wordpress-theme.md`

## Commits

Usar Conventional Commits.

Exemplos:

```txt
chore: add local wordpress infrastructure
docs: add project documentation
fix: adjust database environment variables
feat: add base wordpress theme
refactor: simplify compose configuration
```

## Roadmap resumido

### Fase 01 — Fundação local

* Infra local com Docker
* WordPress + banco
* Configuração por `.env`
* README de setup

### Fase 02 — Tema base

* Tema customizado mínimo
* Header
* Footer
* Assets globais

### Fase 03 — Home institucional

* Hero
* Serviços
* Produtos/categorias
* Sobre
* Localização
* CTA WhatsApp

### Fase 04 — Conteúdo e SEO

* Blog
* Categorias
* SEO local
* Schema básico
* Search Console

### Fase 05 — Operação leve

* Calendário editorial
* Templates de posts
* Checklist de publicação

## Fora de escopo neste momento

A primeira etapa do projeto não deve implementar:

* Tema customizado
* Layout visual
* Plugins próprios
* SEO
* Conteúdo final
* Integração com WhatsApp
* Deploy

O foco inicial é apenas criar uma base local limpa e versionável.

## Licença

Projeto privado.
