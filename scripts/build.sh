#!/usr/bin/env bash
set -eu

ROOT="$(cd "$(dirname "$0")/.." && pwd)"
DIST="$ROOT/dist"
THEMES="$ROOT/wp-content/themes"
PLUGINS="$ROOT/wp-content/plugins"

mkdir -p "$DIST"

echo "Empacotando tema..."
cd "$THEMES"
zip -r "$DIST/mundau-nautica.zip" mundau-nautica \
  -x "*/node_modules/*" \
  -x "*/.git/*" \
  -x "*/src/*" \
  -x "*/AGENTS.md" \
  -x "*/CLAUDE.md"

echo "Empacotando plugin..."
cd "$PLUGINS"
zip -r "$DIST/mundau-nautica-core.zip" mundau-nautica-core \
  -x "*/node_modules/*" \
  -x "*/.git/*" \
  -x "*/src/*" \
  -x "*/AGENTS.md" \
  -x "*/CLAUDE.md"

echo ""
echo "Pronto. Arquivos em $DIST:"
ls -lh "$DIST"/*.zip
