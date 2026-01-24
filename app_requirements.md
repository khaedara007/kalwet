# Kelurahan Service Application Requirements

## Project Overview
A web-based application for kelurahan (sub-district) services that allows citizens to access administrative services from home.

## Technology Stack
- **Framework**: CodeIgniter 3.1.0
- **Database**: MySQL
- **Frontend**: HTML, CSS, JavaScript, Bootstrap
- **Additional**: WhatsApp notification integration

---

## Features

### 1. User/Citizen Page

#### 1.1 Landing Page
- Display kelurahan profile information
- "Submit Service Request" button prominently displayed
- User profile menu
- Change password menu

#### 1.2 Service Request Form
The form should include the following fields:
- **Full Name** (text input, required)
- **NIK** - National Identity Number (text input, required, 16 digits)
- **KK Number** - Family Card Number (text input, required)
- **Phone Number** (text input, required, for WhatsApp notifications)
- **Date of Birth** (date picker, required)
- **Address** (textarea, required)
- **Service Type Selection** (dropdown/radio, required):
  - SKTM (Certificate of Incapacity)
  - Domicile Certificate
  - Certificate of Same Name
  - Parent Income Certificate
  - (More service types can be added later)
- **Additional Notes** (textarea, optional)
- **Document Upload** (file upload, required - PDF/JPG/PNG, max 2MB)

#### 1.3 User Profile
- View and edit personal information
- Change password functionality

#### 1.4 Request Status Display
Display current status of submitted requests:
- **Under Review** - Initial status after submission
- **In Process** - Admin approved and processing the document
- **Needs Revision** - Admin rejected, needs correction
- **Completed** - Document ready for download
- Download button for completed documents

---

### 2. Admin Page

#### 2.1 Dashboard
- Monthly/Yearly service request statistics
- Summary of requests by status
- Summary of requests by service type

#### 2.2 Account Verification Management
- View pending account registration requests
- Verify NIK against kelurahan citizen database
- Approve or reject account requests
- Send automatic WhatsApp notification upon approval/rejection

#### 2.3 Service Request Management
- View all submitted service requests
- Filter by:
  - Status (Under Review, In Process, Needs Revision, Completed)
  - Date range
  - Service type
  - Citizen name/NIK
- Request details view
- Actions:
  - Approve request (change status to "In Process")
  - Reject/Return for revision (change status to "Needs Revision" with reason)
  - Upload completed document (change status to "Completed")

#### 2.4 Report/Recap
- Monthly service request report
- Yearly service request report
- Export to Excel/PDF functionality

#### 2.5 Admin Profile
- View and edit admin information
- Change password functionality

---

## User Flow

### Account Registration Flow
1. Citizen clicks "Register" on the website
2. Citizen fills out registration form:
   - Full Name (required)
   - Phone Number (required, for WhatsApp)
   - NIK (required, 16 digits)
3. System saves registration request with "Pending Verification" status
4. Admin reviews the registration request
5. Admin verifies NIK against kelurahan citizen database
6. **If verified (citizen is registered in kelurahan)**:
   - Admin approves the account
   - System automatically creates user account
   - System sends WhatsApp notification: "Your account has been verified and activated. You can now login to submit service requests."
7. **If not verified (not a kelurahan citizen)**:
   - Admin rejects the account request
   - System sends WhatsApp notification: "Your account registration has been rejected. You are not registered as a citizen of this kelurahan."

### Service Request Flow
1. **Citizen submits request**:
   - Login to the system
   - Navigate to landing page
   - Click "Submit Service Request" button
   - Fill out the service request form (name, NIK, KK number, phone, DOB, address, service type, notes, upload documents)
   - Click "Submit"
   - System displays status: "Under Review"

2. **Admin reviews request**:
   - Admin logs into admin panel
   - Views new service requests in "Under Review" status
   - Reviews submitted form and uploaded documents
   
3. **Admin decision**:
   - **If approved**:
     - Admin clicks "Approve" button
     - Status changes to "In Process"
     - Citizen sees "In Process" on their landing page
     - Admin prepares the official document
   
   - **If rejected/needs revision**:
     - Admin clicks "Return for Revision" button
     - Admin enters revision notes/reason
     - Status changes to "Needs Revision"
     - Citizen sees "Needs Revision" with notes
     - Citizen can edit and resubmit the request

4. **Document completion**:
   - Admin completes preparing the official document
   - Admin uploads the completed document (PDF format)
   - Status changes to "Completed"
   - Citizen sees "Completed" status on landing page

5. **Citizen downloads document**:
   - Citizen clicks "Download" button
   - System downloads the completed official document

---

## Database Schema (Preliminary)

### Users Table
- id (PK, auto increment)
- name (varchar)
- nik (varchar, 16, unique)
- phone (varchar)
- password (varchar, hashed)
- role (enum: 'citizen', 'admin')
- status (enum: 'pending', 'active', 'rejected', 'inactive')
- created_at (datetime)
- updated_at (datetime)

### Service Requests Table
- id (PK, auto increment)
- user_id (FK to users)
- name (varchar)
- nik (varchar, 16)
- kk_number (varchar)
- phone (varchar)
- date_of_birth (date)
- address (text)
- service_type (varchar)
- additional_notes (text)
- upload_suratrtrw (varchar, file path for Surat Pengantar RT/RW)
- upload_kk (varchar, file path for Kartu Keluarga)
- completed_document (varchar, file path)
- status (enum: 'under_review', 'in_process', 'needs_revision', 'completed')
- revision_notes (text)
- submitted_at (datetime)
- processed_at (datetime)
- completed_at (datetime)
- created_at (datetime)
- updated_at (datetime)

### Service Types Table (Master Data)
- id (PK, auto increment)
- service_code (varchar, unique)
- service_name (varchar)
- description (text)
- is_active (boolean)
- created_at (datetime)
- updated_at (datetime)

---

## Non-Functional Requirements

### Security
- Password hashing using bcrypt
- Session management for user authentication
- Input validation and sanitization
- File upload validation (type, size)
- CSRF protection
- XSS prevention

### Performance
- Page load time < 3 seconds
- Responsive design for mobile and desktop
- Optimized database queries

### Usability
- User-friendly interface
- Clear status indicators
- Intuitive navigation
- Indonesian language interface

### Integration
- WhatsApp notification API integration
- Automatic notification triggers

---

## Initial Service Types
1. SKTM (Surat Keterangan Tidak Mampu) - Certificate of Incapacity
2. Surat Domisili - Domicile Certificate
3. Surat Keterangan Satu Nama - Certificate of Same Name
4. Surat Penghasilan Orang Tua - Parent Income Certificate
5. (More can be added through admin panel)

---

## File Structure (CodeIgniter 3.1.0)

```
application/
├── controllers/
│   ├── Auth.php (Login, Register, Logout)
│   ├── User.php (User dashboard, profile)
│   ├── Service.php (Service request submission)
│   └── Admin.php (Admin panel, verification, management)
├── models/
│   ├── User_model.php
│   ├── Service_model.php
│   └── Service_type_model.php
├── views/
│   ├── auth/
│   │   ├── login.php
│   │   └── register.php
│   ├── user/
│   │   ├── landing.php
│   │   ├── service_form.php
│   │   └── profile.php
│   └── admin/
│       ├── dashboard.php
│       ├── account_verification.php
│       ├── service_requests.php
│       └── reports.php
└── config/
    ├── database.php
    └── routes.php

assets/
├── css/
├── js/
└── uploads/
    ├── documents/ (uploaded documents from citizens)
    └── completed/ (completed documents from admin)
```

---

## Future Enhancements
- Email notifications as alternative to WhatsApp
- SMS notifications
- Online payment integration for service fees
- Digital signature for completed documents
- Mobile application (Android/iOS)
- Multi-language support
- Advanced analytics and reporting
- Document tracking with QR code
