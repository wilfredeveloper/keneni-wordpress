#!/bin/bash

# CBC School Modern Theme - Development Helper Script

echo "🚀 CBC School Modern Theme - Development Environment"
echo "=================================================="

# Function to check if Docker is running
check_docker() {
    if ! docker info > /dev/null 2>&1; then
        echo "❌ Docker is not running. Please start Docker first."
        exit 1
    fi
}

# Function to start development environment
start_dev() {
    echo "🔄 Starting development environment..."
    docker-compose up -d
    
    echo "⏳ Waiting for services to be ready..."
    sleep 10
    
    echo "✅ Development environment is ready!"
    echo ""
    echo "🌐 Your site is available at:"
    echo "   Frontend: http://localhost:8080"
    echo "   WordPress Admin: http://localhost:8080/wp-admin"
    echo ""
    echo "📝 To develop:"
    echo "   1. Edit files in your current directory"
    echo "   2. Save changes"
    echo "   3. Refresh your browser to see updates"
    echo ""
    echo "🔍 Useful commands:"
    echo "   ./dev.sh logs    - View logs"
    echo "   ./dev.sh stop    - Stop environment"
    echo "   ./dev.sh restart - Restart environment"
}

# Function to stop development environment
stop_dev() {
    echo "🛑 Stopping development environment..."
    docker-compose down
    echo "✅ Environment stopped."
}

# Function to restart development environment
restart_dev() {
    echo "🔄 Restarting development environment..."
    docker-compose restart
    echo "✅ Environment restarted."
}

# Function to show logs
show_logs() {
    echo "📋 Showing logs (Press Ctrl+C to exit)..."
    docker-compose logs -f
}

# Function to show status
show_status() {
    echo "📊 Development Environment Status:"
    echo "=================================="
    docker-compose ps
    echo ""
    echo "🌐 URLs:"
    echo "   Frontend: http://localhost:8080"
    echo "   Admin: http://localhost:8080/wp-admin"
}

# Function to open site in browser
open_site() {
    echo "🌐 Opening site in browser..."
    if command -v xdg-open > /dev/null; then
        xdg-open http://localhost:8080
    elif command -v open > /dev/null; then
        open http://localhost:8080
    else
        echo "Please open http://localhost:8080 in your browser"
    fi
}

# Function to show help
show_help() {
    echo "CBC School Modern Theme - Development Helper"
    echo ""
    echo "Usage: ./dev.sh [command]"
    echo ""
    echo "Commands:"
    echo "  start     Start the development environment"
    echo "  stop      Stop the development environment"
    echo "  restart   Restart the development environment"
    echo "  status    Show environment status"
    echo "  logs      Show live logs"
    echo "  open      Open site in browser"
    echo "  help      Show this help message"
    echo ""
    echo "Examples:"
    echo "  ./dev.sh start    # Start development"
    echo "  ./dev.sh logs     # Watch logs"
    echo "  ./dev.sh open     # Open in browser"
}

# Main script logic
case "${1:-start}" in
    "start")
        check_docker
        start_dev
        ;;
    "stop")
        check_docker
        stop_dev
        ;;
    "restart")
        check_docker
        restart_dev
        ;;
    "status")
        check_docker
        show_status
        ;;
    "logs")
        check_docker
        show_logs
        ;;
    "open")
        open_site
        ;;
    "help"|"-h"|"--help")
        show_help
        ;;
    *)
        echo "❌ Unknown command: $1"
        echo ""
        show_help
        exit 1
        ;;
esac
