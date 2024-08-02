# Testing Documentation

## Automated Testing

### Test 1: Duplicate Username Detection
**Objective**: Ensure that the system detects and handles duplicate usernames during signup.

**Details**: 
- **Description**: This test verifies that when a user attempts to sign up with a username that already exists in the database, the system correctly prevents the signup and displays an appropriate error message.
- **Steps**:
  1. Sign up with a unique username and ensure the user is created successfully.
  2. Attempt to sign up again with the same username.
  3. Verify that the system responds with a "Username is already taken!" error message.
- **Expected Result**: The second signup attempt should fail with an error message indicating that the username is already taken.

### Test 2: Password Mismatch Detection
**Objective**: Verify that the system detects when passwords do not match during signup.

**Details**: 
- **Description**: This test checks that if the user enters different values for the password and confirm password fields, the system displays an appropriate error message.
- **Steps**:
  1. Attempt to sign up with matching passwords.
  2. Attempt to sign up with mismatched passwords.
  3. Verify that the system responds with a "Passwords do not match!" error message.
- **Expected Result**: The signup attempt with mismatched passwords should fail with an error message indicating that the passwords do not match.

## Manual Testing

### Overview
Manual testing is performed to ensure that all aspects of the website function as expected.

### Testing Steps

1. **Signup Page**
   - Verify that the signup form is accessible and all fields are present.
   - **Test 1**: Test with a username that is already taken and ensure that the appropriate error message is displayed.
   - **Test 2**: Test with matching and mismatched passwords to verify that the error messages are shown correctly.

2. **Login Page**
   - Verify that the login form works with correct credentials.
   - Check error messages for incorrect credentials.

3. **Room Booking**
   - **Navigate to the Booking Page**: Ensure that the booking page is accessible from the website.
   - **Form Completion**:
     - **Room Information**: Verify that room details are automatically populated in the form.
     - **User Information**: Enter your name and ensure it is required.
     - **Payment Method**: Select a payment method from available options.
   - **Submission**: Click the "Book Now" button to complete the booking process.
   - **Database Storage**: Confirm that the booking information is stored in the database for the specific user.

4. **Profile Management**
   - Test if users can view and update their profile information.

5. **Other Features**
   - Test any additional features such as user roles, permissions, and special pages.

### Reporting Issues
- Document any issues or bugs found during manual testing and report them to the development team.

### Summary
- Ensure that both automated and manual testing cover all critical functionalities and edge cases of the application.


