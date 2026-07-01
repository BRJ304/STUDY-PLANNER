# 📖 Study Planner - Project Flow & Architecture Guide

Welcome to the **Study Planner** application guide. This document details the application's features, under-the-hood architecture, data flows, and a step-by-step user walkthrough.

---

## 🚀 Core Features

### 1. Dashboard (Index)
*   **Overview Stats**: Displays live study hours, completed topics count, estimated exam readiness, and continuous study streaks.
*   **Today's Schedule**: Automatically lists the study sessions scheduled for the current day based on the active plan.
*   **Progress Overview**: Renders progress bars tracking completion percentages for active subjects.
*   **Quick Actions**: Shortcuts to jump into the planner, materials, or analytics views.

### 2. AI Study Plan Generator
*   **Custom Parameters**: Input preferred start/end times, study/break durations, study days, subjects, difficulty levels, and weekly targets.
*   **Active Plan Treatment**: Creating a new plan automatically deactivates (pauses) previous plans to keep the scheduler clean and up-to-date.
*   **Flexible Schedules**: Generates dynamic timetables visible in the study calendar.

### 3. Study Materials Manager
*   **Storage Uploads**: Upload documents (up to 10MB) categorized by subject, resource type (notes, assignment, reference, slides), and tags.
*   **Action Actions**: Instantly download files securely or delete unwanted resources.
*   **Highlight Importance**: Flag critical materials with an "Important" star tag.

### 4. Progress Tracker & Analytics
*   **Log Daily Progress**: Log hours studied, focus levels, daily moods (emoji-based), topics mastered, and qualitative session notes.
*   **Interactive Charts**: Dynamic vertical bar charts showing hours studied per day and progress bar metrics per subject.
*   **JSON Data Export**: Export personal study records securely as JSON backups.

### 5. Profile & Settings
*   **Educational Info**: Store school/university and major/specialization details.
*   **Preferences & Switches**: Fine-tune notification settings, timezone, UI theme, language, and account privacy options.

---

## 🗺️ Step-by-Step User Flow

### Step 1: Authentication
*   Navigate to `/register` to create a new user profile.
*   Log in at `/login` to access the personalized workspace.

### Step 2: Set School & Major
*   Navigate to the **Profile** tab.
*   Update your current school and major to link educational context to database models.

### Step 3: Customize General Settings
*   Navigate to the **Settings** tab.
*   Adjust your preferred study style, timezone, notification channels, and privacy visibility.

### Step 4: Create a Study Plan
*   Navigate to **Study Plan** and click **Generate New Plan**.
*   Select your subjects, select the days you want to study, and set your target duration.
*   Upon saving, the calendar immediately populates with your new timetable.

### Step 5: Upload Study Resources
*   Navigate to the **Materials** section.
*   Attach slide files, lecture notes, or textbooks, tagging them by subject for quick organization.

### Step 6: Log Progress
*   At the end of your study sessions, visit the **Progress** page.
*   Click **Log Daily Progress** and record your hours studied and focus level.
*   *Result*: The schedule day instantly marks as **"Complete"** (green indicator) and your dashboard stats (streak, hours studied, exam readiness) update.

---

## 🛠️ Database Schema & Relationships

| Table Name | Description | Key Attributes |
| :--- | :--- | :--- |
| **`users`** | Core credentials & preference settings | `name`, `email`, `timezone`, `theme`, `email_notifications` |
| **`user_information`** | Secondary education profile | `user_id`, `school`, `major` |
| **`study-plan`** | AI timetable settings | `user_id`, `study_days`, `subjects`, `weekly_goal_hours`, `status` |
| **`study_session`** | Specific study slots | `user_id`, `study_plan_id`, `subject`, `start_time`, `status` |
| **`progress`** | Logged metrics per user/day | `user_id`, `date`, `hours_studied`, `focus_level`, `exam_readiness` |
| **`materials`** | Metadata of uploaded resources | `user_id`, `title`, `file_path`, `subject`, `is_important` |

---

## 🧑‍💻 File Directory Structure (Key Components)

*   **Models**:
    *   [User.php](/app/Models/User.php) - User relationships and fillable settings fields.
    *   [UserInformation.php](/app/Models/UserInformation.php) - Maps to `user_information` table.
    *   [Material.php](/app/Models/Material.php) - File asset trackers.
    *   [StudySession.php](/app/Models/StudySession.php) - Calendar slot trackers.
*   **Controllers**:
    *   [DashController.php](/app/Http/Controllers/DashController.php) - Aggregates analytics, streak counts, and today's schedule.
    *   [StudyPlanController.php](/app/Http/Controllers/StudyPlanController.php) - Handles deactivating old plans, creating new ones, and building calendars.
    *   [ProgressController.php](/app/Http/Controllers/ProgressController.php) - Controls daily logs and JSON exports.
    *   [MaterialsController.php](/app/Http/Controllers/MaterialsController.php) - Coordinates secure file storage upload/download streams.
*   **Views**:
    *   [index.blade.php](/resources/views/dashboard/index.blade.php) - Main dashboard UI.
    *   [study-plan.blade.php](/resources/views/dashboard/study-plan.blade.php) - Calendar schedule and stats.
    *   [progress.blade.php](/resources/views/dashboard/progress.blade.php) - Analytical charts and logging tools.
