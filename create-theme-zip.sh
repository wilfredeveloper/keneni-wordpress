#!/bin/bash

# Script to create a ZIP file of the CBC School Modern WordPress theme

echo "Creating CBC School Modern Theme ZIP file..."

# Create theme directory name
THEME_NAME="cbc-school-modern"
ZIP_NAME="${THEME_NAME}.zip"

# Remove existing ZIP if it exists
if [ -f "$ZIP_NAME" ]; then
    rm "$ZIP_NAME"
    echo "Removed existing $ZIP_NAME"
fi

# Create ZIP file with all theme files
zip -r "$ZIP_NAME" \
    style.css \
    functions.php \
    index.php \
    header.php \
    footer.php \
    front-page.php \
    page.php \
    single.php \
    archive.php \
    sidebar.php \
    404.php \
    comments.php \
    searchform.php \
    screenshot.png \
    js/ \
    README.md \
    -x "*.DS_Store" "*.git*" "node_modules/*" "*.log"

if [ $? -eq 0 ]; then
    echo "✅ Successfully created $ZIP_NAME"
    echo "📁 File size: $(du -h "$ZIP_NAME" | cut -f1)"
    echo ""
    echo "🚀 Next steps:"
    echo "1. Upload this ZIP file to WordPress admin"
    echo "2. Go to Appearance > Themes > Add New > Upload Theme"
    echo "3. Select $ZIP_NAME and click 'Install Now'"
    echo "4. Activate the theme"
else
    echo "❌ Error creating ZIP file"
    exit 1
fi
