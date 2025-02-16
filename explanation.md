# Cool Kids Network - Technical Explanation

## Problem Statement

We needed to create a WordPress-based gaming platform where:

1. Users can self-register and get auto-generated game characters
2. Role-based access controls determine data visibility:
   - Cool Kids: Basic self-data
   - Cooler Kids: View others' names/countries
   - Coolest Kids: Full user data access
3. External role management via API
4. Observability and security as core requirements

## Technical Specification

### Core Components

1. **Role System**

   - Custom roles: `cool_kid`, `cooler_kid`, `coolest_kid`
   - Native WordPress capabilities extended with:
     - `read_others_data`
     - `read_all_data`

2. **Registration Flow**

   - Email-only signup
   - Auto-generated credentials
   - RandomUser.me integration for character data
   - Default role assignment

3. **Login Form**

   - Login with Email-only

4. **Dashboard**

   - Contextual data display based on roles
   - Responsive user list grid
   - Graduated data exposure

5. **Role API**

   - API key authentication
   - Dual user identification system
   - Role validation layer

6. **Security**
   - Input sanitization
   - Role change auditing
   - Secure headers

## Key Technical Decisions

### 1. WordPress Native Implementation

**Why**:

- Leverage built-in user management
- Utilize hooks/filters ecosystem
- Ensure future maintainability
- Inherit WordPress security updates

**Tradeoff**:

- Limited to WP user table structure
- Requires careful capability management

### 2. Passwordless Auth for PoC

**Why**:

- Accelerate development
- Simplify testing
- Focus on core game mechanics

**Compromise**:

- Not production-ready
- Requires proper auth implementation later

### 3. REST API Design

**Endpoint**: `POST /update-role`

```json
{
  "email": "...",
  "first_name": "...",
  "last_name": "...",
  "role": "coolest_kid"
}
```
