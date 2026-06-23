# AGENTS.md

Este arquivo define as regras de trabalho para agentes de IA atuando neste repositório.

O objetivo é manter o projeto simples, incremental, bem documentado e fácil de evoluir.

## Projeto

Este repositório contém o site institucional da **Mundaú Náutica**, loja de peças, acessórios e serviços náuticos em Maceió/AL.

O projeto usa **WordPress** como CMS principal.

O foco inicial é criar uma presença digital simples, profissional e sustentável, com atenção a:

* SEO local
* Conteúdo educativo
* Confiança comercial
* Captação de contatos via WhatsApp
* Facilidade de manutenção
* Evolução incremental

## Princípio principal

Trabalhe apenas no escopo solicitado.

Não antecipe fases futuras.

Não implemente tema, plugin, layout, SEO, deploy ou funcionalidades extras se a spec atual não pedir.

## Fontes de verdade

Antes de qualquer alteração relevante, consulte:

* `README.md`
* `ROADMAP.md`
* `docs/project-brief.md`
* `docs/technical-guidelines.md`
* spec ativa em `docs/specs/`

A spec ativa define a entrega atual.

O roadmap define direção.

Os guidelines definem preferências técnicas.

## Fluxo obrigatório de trabalho

Para cada tarefa:

1. Ler a documentação relevante.
2. Identificar a spec ativa.
3. Explicar brevemente o plano antes de alterar arquivos.
4. Implementar apenas o necessário.
5. Atualizar documentação quando o fluxo de uso mudar.
6. Validar mentalmente os critérios de aceite.
7. Sugerir uma mensagem de commit usando Conventional Commits.

## Escopo

Não faça mudanças fora do escopo sem pedir confirmação.

Evite principalmente:

* Criar tema WordPress antes da fase apropriada.
* Instalar plugins sem justificativa.
* Adicionar phpMyAdmin sem necessidade clara.
* Criar páginas ou conteúdo final antes da fase de conteúdo.
* Adicionar frameworks ou bibliotecas sem necessidade.
* Criar abstrações prematuras.
* Alterar decisões de arquitetura sem explicar o motivo.
* Fazer refatorações grandes junto com features pequenas.

## Preferências técnicas

### Docker

Use:

* `compose.yaml`
* volumes nomeados
* rede Docker nomeada compartilhada
* `container_name` nos serviços
* `.env` para variáveis mutáveis e sensíveis
* `.env.example` versionado
* `.env` ignorado no Git

Evite hardcodar credenciais no `compose.yaml`.

O `compose.yaml` deve ser claro, simples e previsível.

### Banco de dados

Preferência inicial:

* MariaDB para ambiente local WordPress

MySQL também pode ser usado se houver justificativa.

O banco deve persistir dados usando volume nomeado.

### WordPress

Não editar arquivos core do WordPress.

Quando chegar a etapa de customização visual, preferir:

* tema próprio
* organização clara de templates
* uso controlado de plugins
* código simples

Não instalar plugins apenas por conveniência se uma solução simples resolver.

### Variáveis de ambiente

O arquivo `.env` deve ser usado para:

* portas locais
* nomes de banco
* usuários
* senhas
* host do banco
* configurações mutáveis

O arquivo `.env.example` deve conter todas as variáveis necessárias, com valores seguros de exemplo.

Nunca commit o `.env`.

## Documentação

Atualize documentação quando:

* mudar o processo de setup
* criar novo comando necessário
* alterar estrutura de pastas
* adicionar serviço novo
* mudar decisão técnica relevante
* concluir ou alterar uma spec

A documentação deve ser objetiva. Nada de romance técnico.

## Roadmap

Siga o `ROADMAP.md`.

Se uma tarefa solicitada conflitar com o roadmap, avise antes de implementar.

Se uma tarefa parecer pertencer a uma fase futura, pergunte antes de antecipar.

## Specs

Cada entrega relevante deve ter uma spec em:

```txt
docs/specs/
```

Formato sugerido:

```txt
001-local-wordpress-infra.md
002-base-theme.md
003-home-page.md
004-seo-and-content.md
```

Cada spec deve conter:

* objetivo
* escopo
* fora de escopo
* requisitos técnicos
* critérios de aceite

A implementação deve seguir a spec ativa.

## Git

Use Conventional Commits.

Exemplos:

```txt
chore: add local wordpress infrastructure
docs: add project brief
docs: add agent workflow guidelines
feat: add base wordpress theme
fix: adjust wordpress database host
refactor: simplify compose services
```

Tipos comuns:

* `chore`: infraestrutura, setup, tarefas de manutenção
* `docs`: documentação
* `feat`: nova funcionalidade
* `fix`: correção de bug
* `refactor`: melhoria interna sem mudar comportamento
* `style`: formatação sem mudança funcional
* `test`: testes

Commits devem ser pequenos e representar uma mudança lógica.

Não misture documentação, infraestrutura e feature visual no mesmo commit, salvo quando forem parte direta da mesma entrega.

## Qualidade

Antes de finalizar uma tarefa, verifique:

* O escopo da spec foi respeitado?
* Alguma coisa fora de escopo foi adicionada?
* A documentação necessária foi atualizada?
* O projeto continua simples?
* Existem credenciais hardcoded?
* O `.env` está ignorado?
* Os comandos documentados funcionam de forma plausível?
* A mensagem de commit sugerida segue Conventional Commits?

## Estilo de implementação

Prefira:

* clareza
* simplicidade
* baixo acoplamento
* configuração explícita
* nomes descritivos
* mudanças pequenas

Evite:

* overengineering
* generalização prematura
* dependências desnecessárias
* magia implícita
* excesso de comentários óbvios
* soluções que dificultem manutenção por uma pessoa só

## Comunicação

Ao responder sobre uma tarefa, seja direto.

Formato recomendado:

```txt
Plano:
1. ...
2. ...
3. ...

Arquivos que serão alterados:
- ...

Fora de escopo:
- ...

Depois da implementação:
- resumo do que foi feito
- como validar
- mensagem de commit sugerida
```

## Regra de ouro

Este projeto deve evoluir como um MVP disciplinado.

Primeiro a fundação.

Depois o tema.

Depois a home.

Depois conteúdo e SEO.

Não transforme uma etapa pequena em um cruzeiro transatlântico.
