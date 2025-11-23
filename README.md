# FAQ-agent-example

Example of customer support agent answering user queries based on FAQ documents

-   Check LarAgent [documentation](https://docs.laragent.ai/introduction) 📄
-   Join LarAgent [Discord Community](https://discord.gg/NAczq2T9F8) 💪
-   Star LarAgent [Repository](https://github.com/maestroerror/laragent) ⭐

## Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/RedberryProducts/faq-agent-example-laragent.git
    cd faq-agent-example-laragent
    ```

2. Install PHP dependencies:

    ```bash
    composer install
    ```

3. Install Node.js dependencies:

    ```bash
    npm install
    ```

4. Create the environment file:

    ```bash
    cp .env.example .env
    ```

5. Generate the application key:

    ```bash
    php artisan key:generate
    ```

6. Run database migrations:

    ```bash
    php artisan migrate
    ```

7. Seed the database with initial data:

    ```bash
    php artisan db:seed
    ```

8. Build frontend assets:

    ```bash
    npm run build
    ```

9. Serve the application:
    ```bash
    php artisan serve
    ```

## Main Components

> **Disclaimer**: This project is intended for demonstration purposes only. Before deploying to a production environment, it is strongly recommended to review and update the prompts, as well as perform extensive testing to ensure reliability.

### Agents (`app/AiAgents`)

-   **GuardAgent**: Acts as a safety layer, checking user messages against defined rules (in `ChatRules`) before processing. It uses `gpt-4.1-mini` and throws a `ViolationException` if a rule is violated.
-   **RetrievalAgent**: Analyzes user queries to identify relevant FAQ documents. It returns a list of document IDs that are most likely to contain the answer, using `gpt-4.1-mini` and structured output.
-   **SupportAgent**: The primary customer support agent. It orchestrates the conversation by first using the `RetrievalAgent` to fetch relevant context, then generating a response using `gpt-4.1`. It maintains chat history and includes a tool to request manager contact.

### Documents Model (`app/Models/Document.php`)

Represents the knowledge base articles (FAQ documents) containing `title`, `description`, and `body`. These documents are indexed and retrieved by the agents to provide accurate answers to user queries.

### ChatPage (`app/Livewire/ChatPage.php`)

A Livewire component that powers the chat interface. It manages the chat state, handles user input, and coordinates with the agents. It validates messages using the `GuardAgent` and generates responses via the `SupportAgent`, while also handling UI elements like typing indicators and error notifications.
