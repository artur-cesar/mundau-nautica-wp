# Technical Guidelines

Este documento define preferências técnicas para o projeto Mundaú Náutica.

As decisões aqui devem orientar agentes de IA e desenvolvedores humanos ao evoluir o projeto.

## Princípios gerais

* Simplicidade antes de sofisticação.
* WordPress como CMS principal.
* Evolução incremental.
* Mudanças pequenas e rastreáveis.
* Documentação objetiva.
* Evitar overengineering.
* Evitar dependências desnecessárias.
* Priorizar manutenção simples.
* Não antecipar fases futuras sem necessidade clara.

## Arquitetura inicial

O projeto começa como um site institucional em WordPress.

A arquitetura inicial deve conter:

* WordPress.
* Banco de dados.
* Docker Compose.
* Tema próprio em fase posterior.
* Conteúdo gerenciado pelo painel do WordPress.

Não criar backend próprio, API externa ou aplicação desacoplada nesta etapa.

## Docker

Usar Docker Compose para o ambiente local.

Preferências:

* Usar `compose.yaml`.
* Usar volumes nomeados.
* Usar rede Docker nomeada compartilhada.
* Definir `container_name` para os serviços.
* Usar `.env` para variáveis mutáveis e sensíveis.
* Versionar `.env.example`.
* Ignorar `.env` no Git.
* Evitar credenciais hardcoded no `compose.yaml`.

Serviços iniciais esperados:

* WordPress.
* Banco de dados MariaDB ou MySQL.

MariaDB é a preferência inicial para ambiente local WordPress, salvo motivo técnico para escolher MySQL.

## Volumes

Usar volumes nomeados para dados persistentes.

Exemplos:

* volume para dados do banco.
* volume para arquivos do WordPress, se necessário.

Evitar depender de bind mounts para dados persistentes do banco.

Bind mounts podem ser usados posteriormente para desenvolvimento de tema, quando fizer sentido.

## Rede Docker

Os serviços devem compartilhar uma rede Docker nomeada.

O WordPress deve acessar o banco usando o nome do serviço Docker.

Exemplo:

```env
WORDPRESS_DB_HOST=database
```

Não usar `localhost` como host do banco dentro do container WordPress.

## Variáveis de ambiente

Usar `.env` para:

* portas locais
* nome do banco
* usuário do banco
* senha do banco
* senha root do banco
* host do banco
* configurações mutáveis

Usar `.env.example` com valores seguros de exemplo.

O `.env.example` deve documentar todas as variáveis necessárias.

Nunca commitar `.env`.

## WordPress

Não editar o core do WordPress.

Customizações devem ficar em:

* tema próprio
* plugin próprio, se necessário
* configurações versionáveis quando possível

Evitar instalar plugins sem justificativa.

Plugins devem ser adicionados apenas quando resolverem um problema real.

## Tema

Quando a fase de tema começar, preferir um tema próprio simples.

Diretrizes:

* HTML semântico.
* CSS organizado.
* Responsividade desde o início.
* Evitar dependência pesada de page builders.
* Usar templates WordPress de forma clara.
* Evitar lógica complexa em templates.
* Separar responsabilidades sempre que possível.

Estrutura possível:

```txt
wp-content/
└── themes/
    └── mundau-nautica/
        ├── style.css
        ├── functions.php
        ├── index.php
        ├── header.php
        ├── footer.php
        ├── front-page.php
        ├── assets/
        │   ├── css/
        │   ├── js/
        │   └── images/
        └── template-parts/
```

Essa estrutura pode ser ajustada conforme a evolução do projeto.

## CSS

Preferir CSS simples e organizado.

Usar variáveis CSS para cores, espaçamentos e fontes.

Sugestão inicial:

```css
:root {
  --color-white: #ffffff;
  --color-background: #f4f5f6;
  --color-graphite: #1f2328;
  --color-text: #111827;
  --color-muted: #6b7280;
  --color-red: #d64545;
  --color-red-dark: #b83232;
}
```

Evitar frameworks CSS na primeira versão, salvo necessidade clara.

Evitar animações sofisticadas na primeira etapa visual.

## JavaScript

Usar JavaScript apenas quando necessário.

Possíveis usos futuros:

* menu mobile
* scroll suave
* comportamento de carrossel simples
* tracking de cliques em WhatsApp

Evitar adicionar bibliotecas grandes para interações simples.

## Imagens

Usar imagens reais da loja sempre que possível.

Priorizar:

* fachada
* interior da loja
* proprietário com motores
* produtos
* acessórios
* serviços/manutenção

Cuidados:

* comprimir imagens
* usar tamanhos adequados
* evitar imagens pesadas
* definir textos alternativos
* não depender de imagens externas instáveis

## SEO

SEO deve ser incremental.

Prioridades iniciais:

* títulos claros
* URLs amigáveis
* headings bem estruturados
* conteúdo local
* metadescrições
* sitemap
* schema local, se possível
* performance razoável
* integração com Google Search Console posteriormente

Não prometer primeira posição no Google.

Não usar técnicas artificiais de SEO.

## Conteúdo

A linguagem deve ser:

* clara
* local
* direta
* comercial sem exagero
* técnica quando necessário
* acessível para cliente comum

Evitar:

* linguagem corporativa demais
* textos genéricos de IA
* promessas exageradas
* frases vazias

O conteúdo deve reforçar que a Mundaú Náutica oferece produtos, orientação técnica e suporte real.

## WhatsApp

O WhatsApp será um CTA importante.

Boas práticas:

* botões visíveis
* links com mensagem inicial quando fizer sentido
* CTA no hero
* CTA em produtos
* CTA em serviços
* CTA na localização

Exemplo futuro de mensagem:

```txt
Olá! Vim pelo site da Mundaú Náutica e gostaria de tirar uma dúvida.
```

## Google Maps

A localização deve ser fácil de acessar.

Sempre que possível, incluir:

* endereço completo
* botão para abrir no Google Maps
* telefone
* WhatsApp
* Instagram
* horário de funcionamento

## Git

Usar Conventional Commits.

Exemplos:

```txt
chore: add local wordpress infrastructure
docs: add project documentation
docs: add technical guidelines
feat: add base wordpress theme
fix: adjust database environment variables
refactor: simplify compose services
```

Tipos recomendados:

* `chore`: infraestrutura, setup e manutenção
* `docs`: documentação
* `feat`: nova funcionalidade
* `fix`: correção
* `refactor`: melhoria interna sem alterar comportamento
* `style`: formatação sem alteração funcional
* `test`: testes

Commits devem ser pequenos e focados.

Não misturar mudanças não relacionadas no mesmo commit.

## Documentação

Atualizar documentação quando:

* mudar o processo de setup
* adicionar serviço
* alterar comando
* mudar estrutura de pastas
* criar nova spec
* concluir fase relevante
* adicionar decisão técnica importante

Documentação deve ser objetiva.

Nada de documentação decorativa que ninguém vai ler.

## Specs

Cada fase relevante deve ter uma spec própria em:

```txt
docs/specs/
```

Formato sugerido:

```txt
001-local-wordpress-infra.md
002-base-theme.md
003-home-page.md
004-mobile-responsiveness.md
005-seo-local.md
```

Cada spec deve conter:

* objetivo
* escopo
* fora de escopo
* requisitos técnicos
* critérios de aceite

Nenhuma fase relevante deve ser implementada sem spec.

## Segurança

Não commitar:

* `.env`
* senhas reais
* tokens
* chaves de API
* backups de banco
* dumps de produção
* credenciais de hospedagem
* credenciais do WordPress

Usar exemplos seguros no `.env.example`.

## Performance

Desde o início, evitar:

* imagens pesadas
* excesso de plugins
* scripts desnecessários
* bibliotecas grandes sem justificativa
* embeds externos em excesso

O site deve ser simples, rápido e fácil de carregar em celular.

## Responsividade

A experiência mobile é prioritária.

O layout deve funcionar bem em:

* celular
* tablet
* desktop

No mobile:

* CTAs devem ser grandes
* texto deve ser legível
* header deve ser simples
* contato e localização devem estar fáceis
* evitar excesso de elementos lado a lado

## Critério de qualidade

Antes de finalizar qualquer entrega, verificar:

* O escopo da spec foi respeitado?
* Alguma fase futura foi antecipada sem necessidade?
* A documentação necessária foi atualizada?
* Existem secrets hardcoded?
* O `.env` está ignorado?
* O `.env.example` está completo?
* Os nomes são claros?
* A solução está simples?
* O projeto continua fácil de manter?

## Regra final

Este projeto deve crescer como um MVP disciplinado.

Primeiro a base.

Depois o tema.

Depois a home.

Depois conteúdo e SEO.

Sem transformar uma loja náutica local em um submarino nuclear no primeiro sprint.
