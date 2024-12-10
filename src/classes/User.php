<?php 
class User {
    private int $id;

    public function __construct(
        private string $nome,
        private string $email,
        private string $senha
    ){}

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getSenha(): string {
        return $this->senha;
    }

    public function save(): bool {
        $conexao = new MySQL();

        $this->senha = password_hash($this->senha,PASSWORD_BCRYPT); 

        $sql = "INSERT INTO users (nome, email, senha) VALUES
            ('{$this->nome}', '{$this->email}', '{$this->senha}')";

        return $conexao->executa($sql);
    }

    public static function exists(string $email): bool {
        $conexao = new MySQL();

        $sql = "SELECT * FROM users WHERE email = '{$email}'";

        return count($conexao->consulta($sql)) > 0;
    }

    public static function login(string $email, string $senha): bool {
        $conexao = new MySQL();

        $sql = "SELECT * FROM users WHERE email = '{$email}'";

        $resultado = $conexao->consulta($sql);

        if(count($resultado) == 0) {
            return false;
        }

        if(!password_verify($senha, $resultado[0]['senha'])) {
            return false;
        }

        session_start();
        $_SESSION['id'] = $resultado[0]['id'];

        return true;
    }
}
?>