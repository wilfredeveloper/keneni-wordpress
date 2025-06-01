#!/bin/bash

# Script to create a ZIP file of the CBC School Modern WordPress theme

echo "Creating CBC School Modern Theme ZIP file..."

# Create theme directory name
THEME_NAME="Keneni-Academy"
ZIP_NAME="${THEME_NAME}.zip"

# Remove existing ZIP if it exists
if [ -f "$ZIP_NAME" ]; then
    rm "$ZIP_NAME"
    echo "Removed existing $ZIP_NAME"
fi

# Create ZIP file with all theme files - INCLUDE EVERYTHING
zip -r "$ZIP_NAME" \
    ./* \
    -x "*.DS_Store" "*.git*" "node_modules/*" "*.log" "docker-compose.yml" "dev.sh" \
    "create-theme-zip.sh" ".gitignore" ".github/*" "package.json" "package-lock.json" \
    "node_modules" "vendor" ".env" "*.zip"

echo "✅ Theme ZIP file created: $ZIP_NAME"
echo "You can now upload this ZIP file to WordPress."
