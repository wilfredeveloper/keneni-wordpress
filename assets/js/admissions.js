/**
 * Admissions Page JavaScript
 * Handles interactive functionality for the admissions page
 */

document.addEventListener('DOMContentLoaded', function() {
    
    // Initialize all functionality
    initTabNavigation();
    initFAQAccordion();
    initSmoothScrolling();
    initFormValidation();
    initDownloadButtons();
    initFormSubmission();
    
    /**
     * Tab Navigation Functionality
     */
    function initTabNavigation() {
        const tabButtons = document.querySelectorAll('.tab-button');
        const tabPanels = document.querySelectorAll('.tab-panel');
        
        tabButtons.forEach(button => {
            button.addEventListener('click', function() {
                const targetTab = this.getAttribute('data-tab');
                
                // Remove active class from all buttons and panels
                tabButtons.forEach(btn => btn.classList.remove('active'));
                tabPanels.forEach(panel => panel.classList.remove('active'));
                
                // Add active class to clicked button and corresponding panel
                this.classList.add('active');
                const targetPanel = document.getElementById(targetTab + '-tab');
                if (targetPanel) {
                    targetPanel.classList.add('active');
                }
            });
        });
    }
    
    /**
     * FAQ Accordion Functionality
     */
    function initFAQAccordion() {
        const faqQuestions = document.querySelectorAll('.faq-question');
        
        faqQuestions.forEach(question => {
            question.addEventListener('click', function() {
                const answer = this.nextElementSibling;
                const isExpanded = this.getAttribute('aria-expanded') === 'true';
                
                // Close all other FAQ items
                faqQuestions.forEach(q => {
                    if (q !== this) {
                        q.setAttribute('aria-expanded', 'false');
                        q.nextElementSibling.classList.remove('open');
                    }
                });
                
                // Toggle current FAQ item
                this.setAttribute('aria-expanded', !isExpanded);
                answer.classList.toggle('open');
            });
        });
    }
    
    /**
     * Smooth Scrolling for Anchor Links
     */
    function initSmoothScrolling() {
        const smoothScrollLinks = document.querySelectorAll('.smooth-scroll');
        
        smoothScrollLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href').substring(1);
                const targetElement = document.getElementById(targetId);
                
                if (targetElement) {
                    targetElement.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    }
    
    /**
     * Form Validation
     */
    function initFormValidation() {
        const form = document.getElementById('admissions-application-form');
        if (!form) return;
        
        const requiredFields = form.querySelectorAll('[required]');
        
        requiredFields.forEach(field => {
            field.addEventListener('blur', function() {
                validateField(this);
            });
            
            field.addEventListener('input', function() {
                if (this.classList.contains('error')) {
                    validateField(this);
                }
            });
        });
        
        function validateField(field) {
            const value = field.value.trim();
            const fieldType = field.type;
            let isValid = true;
            let errorMessage = '';
            
            // Remove existing error styling
            field.classList.remove('error');
            removeErrorMessage(field);
            
            // Check if required field is empty
            if (field.hasAttribute('required') && !value) {
                isValid = false;
                errorMessage = 'This field is required.';
            }
            
            // Email validation
            if (fieldType === 'email' && value) {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(value)) {
                    isValid = false;
                    errorMessage = 'Please enter a valid email address.';
                }
            }
            
            // Phone validation (basic)
            if (fieldType === 'tel' && value) {
                const phoneRegex = /^[\+]?[0-9\s\-\(\)]{10,}$/;
                if (!phoneRegex.test(value)) {
                    isValid = false;
                    errorMessage = 'Please enter a valid phone number.';
                }
            }
            
            if (!isValid) {
                field.classList.add('error');
                showErrorMessage(field, errorMessage);
            }
            
            return isValid;
        }
        
        function showErrorMessage(field, message) {
            const errorElement = document.createElement('span');
            errorElement.className = 'error-message';
            errorElement.textContent = message;
            errorElement.style.color = '#e53e3e';
            errorElement.style.fontSize = '0.875rem';
            errorElement.style.marginTop = '0.25rem';
            
            field.parentNode.appendChild(errorElement);
        }
        
        function removeErrorMessage(field) {
            const existingError = field.parentNode.querySelector('.error-message');
            if (existingError) {
                existingError.remove();
            }
        }
    }
    
    /**
     * Download Button Functionality
     */
    function initDownloadButtons() {
        const downloadChecklistBtn = document.getElementById('download-checklist');
        const downloadCalendarBtn = document.getElementById('download-calendar');
        
        if (downloadChecklistBtn) {
            downloadChecklistBtn.addEventListener('click', function(e) {
                e.preventDefault();
                downloadDocumentChecklist();
            });
        }

        if (downloadCalendarBtn) {
            downloadCalendarBtn.addEventListener('click', function(e) {
                e.preventDefault();
                downloadAcademicCalendar();
            });
        }
        
        function downloadDocumentChecklist() {
            // Check if PDF URL is available from WordPress customizer
            const pdfUrl = window.cbcSchoolData && window.cbcSchoolData.admissions && window.cbcSchoolData.admissions.checklistPdfUrl;

            if (pdfUrl) {
                // Download the uploaded PDF
                downloadFile(pdfUrl, 'admission-document-checklist.pdf');
            } else {
                // Fall back to generating text file
                generateDocumentChecklist();
            }
        }

        function generateDocumentChecklist() {
            // Create a simple text-based checklist
            const documents = [
                'Birth Certificate (Original and Copy)',
                'Previous School Report Cards',
                'Transfer Certificate (if applicable)',
                'Passport Size Photos (4 copies)',
                'Parent/Guardian ID Copies',
                'Medical Certificate',
                'Immunization Records',
                'Proof of Residence'
            ];

            let content = 'ADMISSION DOCUMENT CHECKLIST\n';
            content += '================================\n\n';
            content += 'Please ensure you have the following documents ready for your application:\n\n';

            documents.forEach((doc, index) => {
                content += `${index + 1}. ☐ ${doc}\n`;
            });

            content += '\n\nAdditional Notes:\n';
            content += '- All documents must be original or certified copies\n';
            content += '- International students may require additional documentation\n';
            content += '- Contact our admissions office for specific requirements\n\n';
            content += 'For questions, contact: admissions@school.ac.ke\n';

            downloadTextFile(content, 'admission-document-checklist.txt');
        }
        
        function downloadAcademicCalendar() {
            // Check if PDF URL is available from WordPress customizer
            const pdfUrl = window.cbcSchoolData && window.cbcSchoolData.admissions && window.cbcSchoolData.admissions.calendarPdfUrl;

            if (pdfUrl) {
                // Download the uploaded PDF
                downloadFile(pdfUrl, 'academic-calendar.pdf');
            } else {
                // Fall back to generating text file
                generateAcademicCalendar();
            }
        }

        function generateAcademicCalendar() {
            let content = 'ACADEMIC CALENDAR 2024-2025\n';
            content += '============================\n\n';
            content += 'IMPORTANT DATES:\n\n';
            content += 'ADMISSION DEADLINES:\n';
            content += '- March 15, 2024: Early Application Deadline\n';
            content += '- May 30, 2024: Regular Application Deadline\n';
            content += '- July 15, 2024: Late Application Deadline\n';
            content += '- August 1, 2024: Final Application Deadline\n\n';
            content += 'OPEN HOUSES & TOURS:\n';
            content += '- Every Saturday: School Tours at 10:00 AM\n';
            content += '- February 10, 2024: Open House Event\n';
            content += '- April 20, 2024: Spring Open House\n';
            content += '- June 15, 2024: Summer Information Session\n\n';
            content += 'ACADEMIC TERMS:\n';
            content += '- Term 1: January - April 2024\n';
            content += '- Term 2: May - August 2024\n';
            content += '- Term 3: September - December 2024\n\n';
            content += 'For the complete academic calendar, visit our website or contact the school office.\n';

            downloadTextFile(content, 'academic-calendar-2024-2025.txt');
        }
        
        function downloadFile(url, filename) {
            // Create a temporary link element to trigger download
            const a = document.createElement('a');
            a.href = url;
            a.download = filename;
            a.target = '_blank'; // Open in new tab as fallback
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
        }

        function downloadTextFile(content, filename) {
            const blob = new Blob([content], { type: 'text/plain' });
            const url = window.URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = filename;
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            window.URL.revokeObjectURL(url);
        }
    }
    
    /**
     * Form Submission Handling
     */
    function initFormSubmission() {
        const form = document.getElementById('admissions-application-form');
        if (!form) return;
        
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Validate all required fields
            const requiredFields = form.querySelectorAll('[required]');
            let isFormValid = true;
            
            requiredFields.forEach(field => {
                if (!validateField(field)) {
                    isFormValid = false;
                }
            });
            
            if (!isFormValid) {
                showNotification('Please fill in all required fields correctly.', 'error');
                return;
            }
            
            // Show loading state
            const submitBtn = form.querySelector('.submit-btn');
            const btnText = submitBtn.querySelector('.btn-text');
            const btnLoading = submitBtn.querySelector('.btn-loading');
            
            btnText.style.display = 'none';
            btnLoading.style.display = 'inline';
            submitBtn.disabled = true;
            
            // Submit form via AJAX
            const formData = new FormData(form);
            
            fetch(window.location.href, {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (response.ok) {
                    showNotification('Application submitted successfully! We will contact you within 48 hours.', 'success');
                    form.reset();
                } else {
                    throw new Error('Submission failed');
                }
            })
            .catch(error => {
                showNotification('There was an error submitting your application. Please try again.', 'error');
            })
            .finally(() => {
                // Reset button state
                btnText.style.display = 'inline';
                btnLoading.style.display = 'none';
                submitBtn.disabled = false;
            });
        });
        
        function validateField(field) {
            const value = field.value.trim();
            const fieldType = field.type;
            
            // Basic validation
            if (field.hasAttribute('required') && !value) {
                return false;
            }
            
            if (fieldType === 'email' && value) {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return emailRegex.test(value);
            }
            
            return true;
        }
        
        function showNotification(message, type) {
            // Remove existing notifications
            const existingNotification = document.querySelector('.notification');
            if (existingNotification) {
                existingNotification.remove();
            }
            
            // Create notification element
            const notification = document.createElement('div');
            notification.className = `notification notification-${type}`;
            notification.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                background: ${type === 'success' ? '#48bb78' : '#e53e3e'};
                color: white;
                padding: 1rem 1.5rem;
                border-radius: 8px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                z-index: 1000;
                max-width: 400px;
                animation: slideIn 0.3s ease;
            `;
            
            notification.textContent = message;
            document.body.appendChild(notification);
            
            // Auto remove after 5 seconds
            setTimeout(() => {
                notification.style.animation = 'slideOut 0.3s ease';
                setTimeout(() => {
                    if (notification.parentNode) {
                        notification.remove();
                    }
                }, 300);
            }, 5000);
        }
    }
    
    // Add CSS animations for notifications
    const style = document.createElement('style');
    style.textContent = `
        @keyframes slideIn {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        
        @keyframes slideOut {
            from { transform: translateX(0); opacity: 1; }
            to { transform: translateX(100%); opacity: 0; }
        }
        
        .form-group input.error,
        .form-group select.error,
        .form-group textarea.error {
            border-color: #e53e3e;
            box-shadow: 0 0 0 3px rgba(229, 62, 62, 0.1);
        }
    `;
    document.head.appendChild(style);
});
